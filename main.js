var client = new WebTorrent();
var app = new App();

client.on('error', function (err) {
    console.error('ERROR: ' + err.message)
});



// document.querySelector('.seedFiles').addEventListener('click', function (e) {
//     e.preventDefault(); // Prevent page refresh
//
// //        var torrentId = document.querySelector('form input[name=torrentId]').value;
//     var torrentId = document.forms.upload.elements.myfile.files[0];
//
//     app.seedFiles(torrentId);
//
//     app.log('Adding ' + torrentId);
// //        client.add(torrentId, onTorrent)
//
//
//
// });


myfile.addEventListener('change', function() {

    console.log('1');

    var torrentId = this.files[0];
    app.seedFiles(torrentId);
});


