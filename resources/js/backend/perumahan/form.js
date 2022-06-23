import CustomMap from "../../common/custom-map";

const customMap = new CustomMap(-7.328734394207065, 108.33764670018321, 13, true, 0, '',undefined)

window.updateMap = function()
{
    customMap.updateSize()
}

customMap.setOnDraw(function (coordinates) {
    window.setLokasi(coordinates)
})
customMap.setAddMode(true)
