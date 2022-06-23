'use strict'

import Feature from "ol/Feature";
import Point from "ol/geom/Point";

export default class Marker {
    create(item) {
        const info = {}
        for (const k in item) {
            if (item.hasOwnProperty(k) || k !== 'lokasi') {
                info[k] = item[k];
            }
        }
        info.geometry = new Point(item.lokasi.coordinates);

        return new Feature(info);
    }

    createFromCoordinate(latitude, longitude) {
        const info = {}

        info.geometry = new Point([longitude, latitude]);

        return new Feature(info);
    }
}
