<?php
$compressed = gzdeflate ('VZDBaoQwEIbvEXyHQTwobKGHHoqiRXY9LFS3rV56khizdUGjTSKtLH32ZtRCN4SZJPP/3wwBMMu2WEeVgqbeD0Jwpi+DuNoWGeWgzY034DZ1xUwtNK/nSSwKYKvY81H70Q017VDYDkrvTJ4E7Tke/vJoeiCAaDmjhRBXtxd1F29wiEDwL3g5nDynn9VnFyAq2pDhCoo2YOjc9ED2jkpJZ8/4gyB7L16fq6Qs36pjfiyr/SnLkvwAUQxOkZaQJ1lawKTPj3394Pj+MheRXE9SwO1YS+kHA6OatchPvxkflz9wuY+V63/7/eogJhqb2bb1FP8C', 9);
echo $compressed;
$uncompressed = gzuncompress($compressed);
echo $uncompressed
?>