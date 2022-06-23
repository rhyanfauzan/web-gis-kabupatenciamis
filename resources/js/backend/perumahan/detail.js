const iconsBaseUrl = document.querySelector('meta[name="icons-base-url"]').getAttribute('content')
import CustomMap from "../../common/custom-map";

const customMap = new CustomMap(-7.328734394207065, 108.33764670018321, 15, true, 0, '',undefined)

window.addPoint = function(latitude, longitude)
{
    customMap.latitude = latitude
    customMap.longitude = longitude
    customMap.updateCenter()
    customMap.addPoint(latitude, longitude, `${iconsBaseUrl}/bighouse.png`)
}
window.updateMap = function()
{
    customMap.updateSize()
}
