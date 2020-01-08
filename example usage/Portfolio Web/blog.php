<?php
require('./objects/Blog.php');
$test = new Blog('d','Jonathan\'s Blog', 'Really Cool Stuff On This Blog.');
$sectionTitles = array("Introduction","Enable and enhance cloud-based protection","Blocking potentially unwanted programs");
$sectionContent = array("Windows Defender is commonplace in smaller organisations without AV centralisation, or those that may not wish to purchase enterprise AV subscriptions. However, what is not commonplace is moving beyond the default configuration to provide enhanced protection for endpoints.<br><br>
Microsoft provides a variety of configuration options via Group Policy, InTune or SCCM which enhance Defender’s detection capabilities; pushing Defender to the forefront of modern threat detection. This article serves to summarise information provided through Microsoft’s latest security baseline for Windows 10 and Windows Server 2016, along with collating information from other security professionals and official Microsoft documentation in an easily digestible format.<br><br>
We will cover delivering cloud protection, enhancing cloud-based protection, blocking potentially unwanted programs, and will take a look at Defender’s attack surface reduction rules. This post will cover Group Policy-based deployment, though as mentioned above, InTune, SCCM or PowerShell commandlets are available.",
"Windows Defender’s cloud-based protection “uses distributed resources and machine learning to deliver protection to your endpoints at a rate that is far faster than traditional Security intelligence updates“. This ensures that endpoints take advantage of stronger protection in addition to standard real-time protection.<br><br>
As with all enhancements discussed herein, Group Policy can be configured to enable/enhance cloud protection. This is achieved through the following path – Computer configuration -> Administrative templates -> Windows Components -> Windows Defender Antivirus -> MAPS.<br><br>
The “Join Microsoft MAPS” setting should be configured as Enabled with either Basic or Advanced membership (the distinction does not matter on Windows 10 systems). The “Send file samples when further analysis is required” setting should be set to either Send safe samples or Send all samples, depending on your individual requirements.<br><br>
In summary, the MAPS settings should be configured like so –",
"So now we’ve enabled cloud-based protection along with sample submission, but what else can we configure? Well, we can also enable real-time cloud-based detection for suspicious activities, define the cloud protection blocking level and cloud-based scanning for suspicious files.<br><br>
Real-time cloud-based detection can be enabled through Computer configuration -> Administrative templates -> Windows Components -> Windows Defender Antivirus -> MAPS, by setting the “Configure the ‘Block at First Sight’ feature” setting to Enabled. This requires the following prerequisites –<br><br>
MAPS -> “Join Microsoft MAPS” set to Enabled<br>
MAPS -> “Send file samples when further analysis is required” set to Send safe samples or Send all samples<br>
Real-time Protection -> “Scan all downloaded files and attachments” must be enabled<br>
Real-time Protection -> Do not enable “Turn off real-time protection”<br><br>
The other two settings are configurable through Computer configuration -> Administrative templates -> Windows Components -> Windows Defender Antivirus -> MpEngine. The current Microsoft security baseline does not recommend adjusting the cloud protection level, and the Microsoft docs warn against setting a higher protection level as it may lead to increased false positives.<br><br>
As described in the “Configure extended cloud check” help section, the default cloud check timeout is 10 seconds. This can be increased to allow for extended checking – for example, adjusting the setting to 50 seconds will result in an addition 50 seconds of checks alongside the default 10 seconds, i.e. 60 seconds in total.");
$test->blogPost("Levelling Up", "This is a description", 3, $sectionTitles, $sectionContent, "Epic Master");
$test->displayBlog();
?>
