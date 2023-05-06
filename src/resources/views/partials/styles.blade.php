<style>
.select2-results__option {
padding-left: 10px;
}
.box {
  float:left;
  position:relative;
}
.file-container {
  width: 40px;
  height: 40px;
  display: block;
  float: left;
  margin-left: 0px;
  margin-right: 12px;
  position: relative;
  left: 20%;
  top: 20%;
}

.file {
	font-family: Arial, Tahoma, sans-serif;
	font-weight: 300;
	display: inline-block;
	width: 30px;
	height: 35px;
	background: #a0a0a0;
	position: relative;
	border-radius: 2px;
	text-align: left;
	margin-left: 5px;
	-webkit-font-smoothing: antialiased;
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
}

.file::before {
	display: block;
	content: "";
	position: absolute;
	top: 0;
	right: 0;
	width: 0;
	height: 0;
	border-bottom-left-radius: 2px;
	border-width: 5px;
	border-style: solid;
	border-color: #f2f2f2 #f2f2f2 rgba(255,255,255,.35) rgba(255,255,255,.35);
}

.file::after {
	display: block;
	content: attr(data-type);
	position: absolute;
	bottom: 8px;
	background-color: rgba(102, 102, 102, 0.75);
	left: -35%;
	font-size: 8px;
	text-shadow: 1px 1px 1px #000000;
	color: #fff;
	font-family: monospace;
	width: 50px;
	padding-bottom: 2px;
	padding-top: 1px;
	padding-left: 0px;
	white-space: nowrap;
	overflow: hidden;
}

.file[data-type=dir] {
	background: #ffb700;
}

</style>
