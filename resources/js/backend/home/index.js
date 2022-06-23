const kecamatanGeoJsonUrl = document.querySelector('meta[name="kecamatan-geo-json-url"]').getAttribute('content')

import CustomMap from "../../common/custom-map";

const customMap = new CustomMap(-7.328734394207065, 108.33764670018321, 13, true, 0, '',undefined)

customMap.addPolygonGeoJsonLayer('Kecamatan', kecamatanGeoJsonUrl, '#ffffff', '#8C489F')
