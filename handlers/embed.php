<?php

if (! $this->internal) {
	return;
}

if (! isset ($data['mp4'])) {
	return;
}

if (! preg_match ('|^/files/|', $data['mp4'])) {
	return;
}

$mp4 = preg_replace ('|^/files/|', '', $data['mp4']);
if (! FileManager::verify_file ($mp4)) {
	return;
}

$data['width'] = isset ($data['width']) ? $data['width'] : 952;
$data['height'] = isset ($data['height']) ? $data['height'] : 536;

$page->add_style ('//vjs.zencdn.net/4.12/video-js.css');
$page->add_script ('//vjs.zencdn.net/4.12/video.js');

echo $tpl->render ('videojs/embed', $data);
