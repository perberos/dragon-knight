# Dragon Knight
The Dragon Knight game engine is a web-based tribute to the NES game, Dragon Warrior.

### INTRODUCTION ###
Firstly, I'd like to say thank you for playing my game. The Dragon Knight game engine is the 
result of several months of planning, coding and testing. The original idea was to create a 
web-based tribute to the NES game, Dragon Warrior. In its current iteration, only the underlying 
fighting system really resembles that game, as almost everything else in DK has been made bigger 
and better. But you should still recognize bits and pieces as stemming from Dragon Warrior and 
other RPGs of old.

This is the first game I've ever written, and it has definitely been a positive experience. It 
got difficult at times, admittedly, but it was still a lot of fun to write, and even more fun to 
play. And I hope to use this experience so that if I ever want to create another game it will be 
even better than this one.

Once again, thanks for playing!

Jamin Seven
Dragon Knight creator

### SYSTEM REQUIREMENTS ###
- PHP (4.1 and higher)
- MySQL
- zlib compression enabled on your server (optional)

### INSTALLATION INSTRUCTIONS ###
1. Create a new database for Dragon Knight to use, if you don't already have one set up.
2. Edit 'config.php' to include the correct values for your database setup.
3. Upload the contents of the Dragon Knight folder to your site.
4. In your browser, run 'install.php' and follow the instructions.
5. After completing installation, delete 'install.php' from your Dragon Knight directory for security.
6. Enjoy the game.

### LICENSE INFORMATION ###
The game is released as open-source with some limitations: You may install the game on your server 
and run it however you wish. You may also modify the program code for your own personal use in any 
way you see fit. You may not, however, redistribute the program (modified or stock) in any manner. 
And you may not alter the copyright or powered by notices at the bottom of the game pages in any 
manner. Short of those few rules, you are given free reign to do what you wish.

Being a free product, no technical support is guaranteed - however, you are free to post on the 
official DK forums if you need help with something. Due to time restraints, I will not answer support 
requests via email, so don't even try. By downloading the game, you agree to the above-mentioned rules, 
and you also agree not to hold the author responsible for anything in the event that something goes 
wrong. You use this program entirely at your own risk.

### COPYRIGHT ###
The Dragon Knight game engine in its entirety (scripts, images, etc.) is copyright 2003-2006 by
renderse7en and Jamin Seven, with exceptions for the few instances where I got coding help/tips
from replies to the php manual. Such instances are noted in the scripts.

Upgrade Instructions

### 1.1.11 ###
CHANGED FILES:
- lib.php
- users.php
- help.php
- help_items.php
- help_levels.php
- help_monsters.php
- help_spells.php
- templates/primary.php
DIRECTIONS:
Upload the files. That's it.

### 1.1.10 ###
CHANGED FILES:
- lib.php
- cookies.php
- forum.php
DIRECTIONS:
Upload the files. That's it.

### 1.1.9 ###
CHANGED FILES:
- lib.php
- index.php
- help.php
- users.php
- templates/admin.php
DIRECTIONS:
Upload the files. That's it.

### 1.1.8 ###
CHANGED FILES:
- lib.php
MOVED FILES:
- admin.php
DIRECTIONS:
In this version, the admin.php file has been moved to the game root directory. When you unzip the new
distribution file, make sure to upload the new copy of admin.php into the root directory of your game.
Then upload the new lib.php, and you can delete the /admin/ subdirectory of the game folder.

### 1.1.7 ###
CHANGED FILES:
- fight.php
- lib.php
DIRECTIONS:
Upload the files. That's it.

### 1.1.6 ###
CHANGED FILES:
- lib.php
- fight.php
- towns.php
- admin/admin.php
DIRECTIONS:
Upload the files. That's it.

### 1.1.5 ###
CHANGED FILES:
- lib.php
- towns.php
DIRECTIONS:
Upload the two files. That's it.

### 1.1.4 ###
CHANGED FILES:
- index.php
- lib.php
- towns.php
DIRECTIONS:
Upload the three files. That's it.

### 1.1.3a ###
CHANGED FILES:
- lib.php
- forum.php
DIRECTIONS:
Upload the two files. That's it.

### 1.1.3 ###
CHANGED FILES:
- index.php
- lib.php
- login.php
- admin/admin.php
- templates/admin.php
NEW FILES:
- cookies.php
REMOVED FILES:
- admin/lib.php
DIRECTIONS:
No database changes this time. Just upload the changed/new files above, and you're
good to go. You can delete lib.php out of the admin directory too, if you want, since
it's not used anymore.

### 1.1.2 ###
CHANGED FILES:
- install.php (do not upload if you've already installed the game)
- lib.php
- fight.php
- help.php
- config.php
NEW FILES:
- upgrade_to_112.php
DIRECTIONS:
If you're already using 1.1, upload the files above (except for install.php). Be sure to put your 
database values into the new config.php file. Then run upgrade_to_112.php in your browser. If you're
still using a 1.0.x version, you should first perform the directions for upgrading to 1.1.0,
then 1.1.1, in that order. Then upload the files, then run the upgrade_to_112.php in your browser.
NOTE:
Running the upgrade script should only be done if you did not alter the order in which new spells
are gained. Changes to the actual spells don't matter, only the levels in which they are learned.
The upgrade script will automatically reset spells for all user accounts to their default order.
If you have altered that order, just execute the following two SQL queries in your admin program
of choice.
ALTER TABLE `dk_users` CHANGE `towns` `towns` VARCHAR( 50 ) DEFAULT '0' NOT NULL;
ALTER TABLE `dk_users` CHANGE `spells` `spells` VARCHAR( 50 ) DEFAULT '0' NOT NULL;
Be sure to substitude "dk_users" to your actual table names, if you've changed the prefix.

### 1.1.1 ###
CHANGED FILES:
- users.php
- towns.php
DIRECTIONS:
If you're already using 1.1, you only need to upload the two files listed above. If you are still at a
1.0.x version, you need to do the 1.1.0 stuff listed below as well.

### 1.1.0 ###
CHANGED FILES:
- users.php
- install.php
- index.php
- config.php
- lib.php
- towns.php
- heal.php
- fight.php
- admin/admin.php
- templates/register.php
- templates/login.php
- templates/leftnav.php
- templates/towns.php
NEW FILES:
- templates/verify.php
- templates/lostpassword.php
- templates/changepassword.php
- upgrade_to_110.php
DIRECTIONS:
Version 1.1.0 is a major upgrade. It is suggested you close the game (in Main Settings) before starting
the upgrade. To upgrade, upload the above-listed changed/new files to their proper directories. Re-edit
the proper variables in config.php. Then run upgrade_to_110.php in your browser. After the upgrade script
has completed, log into the game and reset your Main Settings in the control panel.

### 1.0.4 ###
CHANGED FILES:
- config.php
- fight.php
- index.php
- /templates/admin.php
DIRECTIONS:
No database change is necessary. Upload the changed files and re-edit the appropriate variables in
config.php. That's it.

### 1.0.3 ###
CHANGED FILES:
- config.php
- fight.php
- lib.php
- /templates/leftnav.php
NEW FILES:
- help.php
- help_items.php
- help_levels.php
- help_monsters.php
- help_spells.php
DELETED FILES:
- /admin/install.php
- /help/*.*
DIRECTIONS:
No database change is necessary. Upload the changed and new files listed above, delete the extra copy
of install.php from your /admin/ directory, then delete the entire /help/ folder altogether. All
help files have been renamed and moved to the main directory, to get rid of the paths problem that
was occurring. Make sure you re-edit the appropriate variables in config.php too. Note that the
$app_path variable in lib.php is no longer necessary, so it has been removed. config.php is the 
ONLY file you need to edit to make the program work.

### 1.0.2 ###
CHANGED FILES:
- config.php
- fight.php
- lib.php
- install.php
DIRECTIONS:
No database change is necessary. Just upload the files listed above (do not upload install.php if
you already installed the game without any problems) and re-edit the appropriate variables in
config.php. There is a new variable at the top of lib.php that you'll need to edit as well.
