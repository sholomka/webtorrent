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
<!--<script src="https://cdn.jsdelivr.net/webtorrent/latest/webtorrent.min.js"></script>-->
<script src="webtorrent.min.js"></script>
<script src="app.js"></script>
<script src="main.js"></script>
</body>
</html>