<script>
    $(".gallery .gallery-item").each(function () {
        const me = $(this);

        me.attr("href", me.data("image"));
        me.attr("title", me.data("title"));
        if (me.parent().hasClass("gallery-fw")) {
            me.css({
                height: me.parent().data("item-height"),
            });
            me.find("div").css({
                lineHeight: me.parent().data("item-height") + "px",
            });
        }
        me.css({
            backgroundImage: 'url("' + me.data("image") + '")'
        });
    });
    $(".gallery").Chocolat({
        className: "gallery",
        imageSelector: ".gallery-item",
    });

    window.addPoint({{ $item->lokasi->getLat() }}, {{ $item->lokasi->getLng() }})

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        if (e.target.id === 'lokasi-tab')
        {
            window.updateMap()
        }
    })
    
</script>
