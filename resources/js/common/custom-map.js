'use strict'

import GeoJSON from 'ol/format/GeoJSON';
import Map from 'ol/Map';
import Overlay from 'ol/Overlay';
import Point from 'ol/geom/Point';
import {Tile as TileLayer, Vector as VectorLayer} from 'ol/layer';
import OSM from 'ol/source/OSM';
import View from 'ol/View';
import {Icon, Style, Stroke, Fill, Text} from 'ol/style';
import VectorSource from 'ol/source/Vector';
import {ScaleLine, defaults as defaultControls} from 'ol/control';
import Draw from 'ol/interaction/Draw';
import Marker from "./marker";

export default class CustomMap {
    constructor(latitude, longitude, zoom, loadBaseMap, id, newIcon, onClick) {
        this.id = id
        this.onClick = onClick
        this.addMode = false
        this.firstAddMode = true
        this.container = document.getElementById('popup')
        this.content = document.getElementById('popup-content')
        this.closer = document.getElementById('popup-closer')

        if (latitude === 0)
        {
            latitude = -0.9474407764478955
        }
        if (longitude === 0)
        {
            longitude = 119.15351908888232
        }
        this.latitude = latitude
        this.longitude = longitude

        this.zoom = zoom
        this.center = [this.longitude, this.latitude]

        this.overlay = new Overlay({
            element: this.container,
            autoPan: true,
            autoPanAnimation: {
                duration: 250,
            },
        })

        this.layers = [];
        if (loadBaseMap)
        {
            this.layers.push(new TileLayer({
                source: new OSM()
            }))
        }

        this.map = new Map({
            controls: defaultControls().extend([
                new ScaleLine({
                    units: 'degrees',
                }) ]),
            layers: this.layers,
            target: 'map',
            overlays: [this.overlay],
            view: new View({
                projection: 'EPSG:4326',
                center: this.center,
                zoom: this.zoom,
            })
        })
        this.highlight = undefined
        this.highlightStyle = this.createHighlightStyle()
        const _this = this
        this.featureOverlay = new VectorLayer({
            source: new VectorSource(),
            map: this.map,
            style: function (feature) {
                _this.highlightStyle.getText().setText(feature.get('nama'))
                return _this.highlightStyle
            },
        });

        this.map.on('singleclick', function (evt) {
            const coordinate = evt.coordinate
            console.log(_this.addMode)
            if (!_this.addMode)
            {
                let html = ''
                const featureDetecteds = []
                _this.map.forEachFeatureAtPixel(evt.pixel, function (feature) {
                    if (_this.onClick !== undefined)
                    {
                        _this.onClick(feature)
                        _this.highlightLayer(evt.pixel)
                    } else {
                        console.log(feature.values_)
                        const infos = []
                        for (const item in feature.values_) {
                            if (item !== 'geometry')
                            {
                                let label = item.charAt(0).toUpperCase() + item.slice(1)
                                label = label.replace('_', ' ')
                                infos.push(`<span>${label}: ${feature.get(item)}</span><br/>`)
                            }

                        }
                       /* const id = feature.get('id')
                        const nama = feature.get('nama')
                        const jenis = feature.get('jenis')
                        if (!featureDetecteds.includes(`<span>${nama} (${jenis})</span><br/>`))
                        {
                            html += `<span>${nama} (${jenis})</span><br/>`
                            featureDetecteds.push(`<span>${nama} (${jenis})</span><br/>`)
                        }*/
                        if (!featureDetecteds.includes(infos.join('')))
                        {
                            html += infos.join('')
                            featureDetecteds.push(infos.join(''))
                        }
                    }

                })

                if (html !== '')
                {
                    _this.content.innerHTML = html
                    _this.overlay.setPosition(coordinate)
                }
            }
        })

        this.map.on('pointermove', function (evt) {
            if (evt.dragging) {
                return;
            }
            const pixel = _this.map.getEventPixel(evt.originalEvent);
            _this.highlightLayer(pixel)
        })

        this.closer.onclick = function () {
            _this.overlay.setPosition(undefined)
            _this.closer.blur()
            return false
        }
    }

    setOnDraw(_onDraw)
    {
        this.onDraw = _onDraw
    }

    setAddMode(_addMode)
    {
        this.addMode = _addMode
        if (_addMode)
        {
            const _this = this
            if (this.firstAddMode)
            {
                this.vectorUsulanSource = new VectorSource({wrapX: false})

                this.vectorUsulanLayer = new VectorLayer({
                    source: this.vectorUsulanSource,
                })

                this.map.addLayer(this.vectorUsulanLayer)
                this.firstAddMode = false
            }

            this.draw = new Draw({
                source: this.vectorUsulanSource,
                type: 'Point',
            });
            this.draw.on('drawend', function (evt) {
                const feature = evt.feature;
                const coords = feature.getGeometry().getCoordinates()
                _this.onDraw(coords)
            })
            this.map.addInteraction(this.draw);
        } else
        {
            this.map.removeInteraction(this.draw);
        }
    }

    isAddMode()
    {
        return this.addMode
    }

    updateCenter()
    {
        this.map.getView().animate({
            center: [this.longitude, this.latitude],
            zoom: this.zoom,
            duration: 250
        })
    }

    addVectorLayer(features)
    {
        const vectorSource = new VectorSource({
            features: features,
        })

        const vectorLayer = new VectorLayer({
            source: vectorSource,
        })

        this.map.addLayer(vectorLayer)
    }

    createPolygonStyle(strokeColor, color)
    {
        return new Style({
            stroke: new Stroke({
                color: strokeColor,
                width: 1,
            }),
            fill: new Fill({
                color: color,
            }),
            text: new Text({
                font: '12px Calibri,sans-serif',
                fill: new Fill({
                    color: '#000',
                }),
                stroke: new Stroke({
                    color: '#fff',
                    width: 3,
                }),
            }),
        })
    }

    createHighlightStyle()
    {
        return new Style({
            stroke: new Stroke({
                color: '#336699',
                width: 1,
            }),
            fill: new Fill({
                color: 'rgba(255,0,0,0.1)',
            }),
            text: new Text({
                font: '12px Calibri,sans-serif',
                fill: new Fill({
                    color: '#000',
                }),
                stroke: new Stroke({
                    color: '#fff',
                    width: 3,
                }),
            }),
        })
    }

    highlightLayer(pixel) {
        const feature = this.map.forEachFeatureAtPixel(pixel, function (feature) {
            return feature;
        });

        if (feature !== this.highlight) {
            if (this.highlight) {
                this.featureOverlay.getSource().removeFeature(this.highlight);
            }
            if (feature) {
                this.featureOverlay.getSource().addFeature(feature);
            }
            this.highlight = feature;
        }
    };

    addPolygonGeoJsonLayer(type, geoJsonUrl, strokeColor, color)
    {
        const greyStyle = this.createPolygonStyle(strokeColor, color)
        const geoJsonLayer = new VectorLayer({
            source: new VectorSource({
                url: geoJsonUrl,
                format: new GeoJSON(),
            }),
            style: function (feature) {
                greyStyle.getText().setText(feature.get('nama'))
                return greyStyle;
            },
        })
        this.layers.push(geoJsonLayer)
        this.map.addLayer(geoJsonLayer)

        const source = geoJsonLayer.getSource();
        const features = source.getFeatures();
        for (let j = 0; j < features.length; j++)
        {
            const feature = features[j]
            feature.setStyle(greyStyle)
        }
        source.dispatchEvent('change')
        geoJsonLayer.dispatchEvent('change')
    }

    addLineGeoJsonLayer(geoJsonUrl, strokeColor, color)
    {
        const greyStyle = this.createPolygonStyle(strokeColor, color)
        const geoJsonLayer = new VectorLayer({
            source: new VectorSource({
                url: geoJsonUrl,
                format: new GeoJSON(),
            }),
            style: function (feature) {
                return greyStyle;
            },
        })
        this.layers.push(geoJsonLayer)
        this.map.addLayer(geoJsonLayer)

        const source = geoJsonLayer.getSource();
        const features = source.getFeatures();
        for (let j = 0; j < features.length; j++)
        {
            const feature = features[j]
            feature.setStyle(greyStyle)
        }
        source.dispatchEvent('change')
        geoJsonLayer.dispatchEvent('change')
    }

    addPointGeoJsonLayer(geoJsonUrl, icon)
    {
        const iconStyle = new Style({
            image: new Icon({
                anchor: [0.5, 32],
                anchorXUnits: 'fraction',
                anchorYUnits: 'pixels',
                src: icon,
            }),
        })

        const geoJsonLayer = new VectorLayer({
            source: new VectorSource({
                url: geoJsonUrl,
                format: new GeoJSON(),
            }),
            style: function (feature) {
                return iconStyle;
            },
        })
        this.layers.push(geoJsonLayer)
        this.map.addLayer(geoJsonLayer)

        const source = geoJsonLayer.getSource();
        const features = source.getFeatures();
        for (let j = 0; j < features.length; j++)
        {
            const feature = features[j]
            feature.setStyle(iconStyle)
        }
        source.dispatchEvent('change')
        geoJsonLayer.dispatchEvent('change')
    }

    addPoint(latitude, longitude, icon)
    {
        const features = []
        const marker = new Marker()

        const iconStyle = new Style({
            image: new Icon({
                anchor: [0.5, 32],
                anchorXUnits: 'fraction',
                anchorYUnits: 'pixels',
                src: icon,
            }),
        })

        const feature = marker.createFromCoordinate(latitude, longitude)
        feature.setStyle(iconStyle)
        features.push(feature)
        this.addVectorLayer(features)
    }

    addPoints(url, icon)
    {
        const _this = this
        const features = []
        const marker = new Marker()

        axios.get(url)
            .then((response) => {
                const data = response.data

                for (let i = 0; i < data.items.length; i++)
                {
                    const item = data.items[i]

                    const iconStyle = new Style({
                        image: new Icon({
                            anchor: [0.5, 32],
                            anchorXUnits: 'fraction',
                            anchorYUnits: 'pixels',
                            src: icon,
                        }),
                    })

                    const feature = marker.create(item)
                    feature.setStyle(iconStyle)
                    features.push(feature)
                }
                _this.addVectorLayer(features)
            }).catch((error) => {
            console.log(error)
        })
    }

    updateSize()
    {
        this.map.updateSize()
    }
}
