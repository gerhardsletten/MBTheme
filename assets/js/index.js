var $ = global.jQuery = global.$ = require('jquery/dist/jquery')
var fitVids = require('fitvids')

$(function () {
  fitVids('.entry-content, .video-content')
})
