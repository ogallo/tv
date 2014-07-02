// JavaScript Document

var myVideo = _V_("my_video_1");

function onComplete(){

        var myVideo1 = document.getElementsByTagName('video')[0];
        var videoPlaying = myVideo1.currentSrc;
        var ext = videoPlaying.substr(videoPlaying.lastIndexOf("."));
        myVideo1.src = 'video/video2.mp4';
                
        myVideo.load();
        myVideo.play();
        myVideo.removeEvent("ended", onComplete);
};

myVideo.addEvent("ended", onComplete);