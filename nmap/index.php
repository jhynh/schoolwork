<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="top">
        <?php include 'header.inc'?>
        <title>nmaping</title>
        <form method="post" style="line-height:50px;">
            <input type="name" name="a" value="128" disabled="" size="1">
            <input type="name" name="b" value="" size="1">
            <input type="name" name="c" value="" size="1">
            <input type="name" name="d" value="253" disabled="" size="1">
            ping
            <input type="checkbox" name="ping" checked="">
            <input type="submit" name="submit">
        </form>
    </div>
    <!--th table header td table data-->
    <div id="left" class="split left">
        <div id="tableAll">
            <table id="all">
                    <tr>
                        <th>NAME</th>
                        <th>IP</th>
                        <th>STATUS</th>
                        <th>LAST_ACTIVE</th>
                    </tr>
                    <?php include 'printtable.php' ?>
            </table>
        </div>
    </div>
    <div id="right" class="split right">
        <div id="tableOn">
            <h1>online</h1>
            <table id="on">
                <tr>
                    <th>NAME</th>
                    <th>IP</th>
                    <th>UP_TIME</th>
                </tr>
            </table>
        </div>
        <div id="tableOff">
            <h1>offline</h1>
            <table id="off">
                <tr>
                    <th>NAME</th>
                    <th>IP</th>
                    <th>DOWN_TIME</th>
                </tr>
            </table>
        </div>
        <div id="tableOff">
            <h1>Version</h1>
            <table id="ver">
                <tr>
                    <th>IP</th>
                    <th>INFO</th>
                </tr>
            </table>
        </div>
        <a class="iframeTitle">terminal commands: </a><br>
        <iframe src="cmd.php" title="linux-commands" class="iframe"></iframe>
    </div>
</body>
</html>