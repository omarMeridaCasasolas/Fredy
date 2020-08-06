var deptoInfSis = new ol.Feature({
    geometry: new ol.geom.Point(ol.proj.fromLonLat([-66.14695, -17.39295]))
});

var stylePoint = new ol.style.Style({
    image: new ol.style.Icon(/** @type {module:ol/style/Icon~Options} */ ({
        scale: 0.4,
        src: 'imagenes/open-iconic/png/map-marker-8x.png'
      }))
});

deptoInfSis.setStyle(stylePoint);

var vectorSource = new ol.source.Vector({
    features: [deptoInfSis]
});

var vectorLayer = new ol.layer.Vector({
    source: vectorSource
});

var tileLayer = new ol.layer.Tile({
    source: new ol.source.OSM()
})

var map = new ol.Map({
    layers: [tileLayer, vectorLayer],
    target: document.getElementById('mapa'),
    view : new ol.View({
        center: ol.proj.fromLonLat([-66.14695, -17.39295]),
        zoom: 18
    })
});