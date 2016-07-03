class App {
    constructor() {}
    
    log (str) {
        var p = document.createElement('p');
        p.innerHTML = str;
        document.querySelector('.log').appendChild(p)
    }

    seedFiles(file) {
        client.seed(file, (torrent) => {
            this.log('Got torrent metadata!');
            this.log(
                'Torrent info hash: ' + torrent.infoHash + ' ' +
                '<a href="' + torrent.magnetURI + '" target="_blank">[Magnet URI]</a> ' +
                '<a href="' + torrent.torrentFileBlobURL + '" target="_blank" download="' + torrent.name + '.torrent">[Download .torrent]</a>'
            );

            // Print out progress every 5 seconds
            // var interval = setInterval(() => {
            //     this.log('Progress: ' + (torrent.progress * 100).toFixed(1) + '%')
            // }, 5000);

            torrent.on('done', () => {
                this.log('Progress: 100%');
                // clearInterval(interval)
            });

            // Render all files into to the page
            torrent.files.forEach(file => {
                file.appendTo('.log');
                this.log('(Blob URLs only work if the file is loaded from a server. "http//localhost" works. "file://" does not.)')
                file.getBlobURL((err, url) => {
                    if (err) return this.log(err.message);
                    this.log('File done.');
                    this.log('<a href="' + url + '" download="'+file.name+'">Download full file: ' + file.name + '</a>')
                })
            })
        })        
    }

    openTorrentFile(file) {
;
    }
    
    // var buildMagnetURI = function(infoHash) {
    //     return 'magnet:?xt=urn:btih:' + infoHash + '&tr=udp%3A%2F%2Ftracker.publicbt.com%3A80&tr=udp%3A%2F%2Ftracker.openbittorrent.com%3A80&tr=udp%3A%2F%2Ftracker.ccc.de%3A80&tr=udp%3A%2F%2Ftracker.istole.it%3A80&tr=udp%3A%2F%2Fopen.demonii.com%3A1337&tr=udp%3A%2F%2Ftracker.coppersurfer.tk%3A6969&tr=udp%3A%2F%2Fexodus.desync.com%3A6969';
    // }
}