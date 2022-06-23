const geojsonUrl = document.querySelector('meta[name="geojson-url"]').getAttribute('content')
const iconsBaseUrl = document.querySelector('meta[name="icons-base-url"]').getAttribute('content')

import CustomMap from "../../common/custom-map";

const customMap = new CustomMap(-7.328734394207065, 108.33764670018321, 13, true, 0, '',undefined)

customMap.addPointGeoJsonLayer(geojsonUrl, `${iconsBaseUrl}/bighouse.png`)
