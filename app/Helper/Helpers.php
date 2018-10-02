<?php


function dashboardName(){
	return "Comapny Name";
}

function getAgentId(){
	return Auth::guard('student')->user()->id;
}
function getAgent(){
	return Auth::guard('student')->user();
}
function getIntroducerId(){
	return Auth::guard('student')->user()->introducer_id;
}

function getAdminId(){
	return Auth::guard('student')->user()->id;
}
function getAdmin(){
	return Auth::guard('student')->user();
}

