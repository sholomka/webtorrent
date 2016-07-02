<!doctype html>
<html>
<body>
<h1>Download files using the WebTorrent protocol (BitTorrent over WebRTC).</h1>

<form name="upload">
    <label for="torrentId">Download from a magnet link: </label>

    <input type="file" name="myfile">

<!--    <input name="torrentId", placeholder="magnet:" value="magnet:?xt=urn:btih:6a9759bffd5c0af65319979fb7832189f4f3c35d&dn=sintel.mp4&tr=wss%3A%2F%2Ftracker.btorrent.xyz&tr=wss%3A%2F%2Ftracker.fastcast.nz&tr=wss%3A%2F%2Ftracker.openwebtorrent.com&tr=wss%3A%2F%2Ftracker.webtorrent.io&ws=https%3A%2F%2Fwebtorrent.io%2Ftorrents%2Fsintel-1024-surround.mp4">-->
    <button type="submit">Download</button>
</form>

<h2>Log</h2>
<div class="log"></div>

<!-- Include the latest version of WebTorrent -->
<script src="https://cdn.jsdelivr.net/webtorrent/latest/webtorrent.min.js"></script>

<script defer src="app.js"></script>

<script>
    var client = new WebTorrent()

    client.on('error', function (err) {
        console.error('ERROR: ' + err.message)
    })

    
    document.querySelector('form').addEventListener('submit', function (e) {
        e.preventDefault() // Prevent page refresh


//        console.log(document.forms.upload.elements.myfile.files[0]);


//        var torrentId = document.querySelector('form input[name=torrentId]').value;

        
        var torrentId = document.forms.upload.elements.myfile.files[0];
        client.seed(torrentId, onTorrent);

        
        log('Adding ' + torrentId)
//        client.add(torrentId, onTorrent)
    })

    function onTorrent (torrent) {
        log('Got torrent metadata!')
        log(
                'Torrent info hash: ' + torrent.infoHash + ' ' +
                '<a href="' + torrent.magnetURI + '" target="_blank">[Magnet URI]</a> ' +
                '<a href="' + torrent.torrentFileBlobURL + '" target="_blank" download="' + torrent.name + '.torrent">[Download .torrent]</a>'
        )

        // Print out progress every 5 seconds
        var interval = setInterval(function () {
            log('Progress: ' + (torrent.progress * 100).toFixed(1) + '%')
        }, 5000)

        torrent.on('done', function () {
            log('Progress: 100%')
            clearInterval(interval)
        })

        // Render all files into to the page
        torrent.files.forEach(function (file) {
            file.appendTo('.log')
            log('(Blob URLs only work if the file is loaded from a server. "http//localhost" works. "file://" does not.)')
            file.getBlobURL(function (err, url) {
                if (err) return log(err.message)
                log('File done.')
                log('<a href="' + url + '" download="'+file.name+'">Download full file: ' + file.name + '</a>')
            })
        })
    }

    function log (str) {
        var p = document.createElement('p')
        p.innerHTML = str
        document.querySelector('.log').appendChild(p)
    }
</script>
</body>
</html>