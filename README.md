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

# Upgrade Instructions

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

# Changelog

### 1.1.11 (3.26.2006) ###
### Thanks to r0xes & Adam. :)
- Added recursive htmlspecialchars to the rest of the superglobal security in lib.php.
- Fixed a bug that allowed blank passwords.
- Updated copyright dates as necessary.

### 1.1.10b (10.25.2005) ###
- Fixed addslashes_deep() to actually add slashes, instead of strip them. Man, I'm dumb.

### 1.1.10a (10.1.2005) ###
### Thanks to obliv. :)
- Fixed a security error.

### 1.1.10 (3.13.2005) ###
### Thanks to Gary13579. :)
- Fixed a security error.
- Added verified/banned checking in the built-in forum.

### 1.1.9 (3.2.2005) ###
### Thanks to xudzh and ChAoS and Adam. :)
- Character names now have validation checking.
- Fixed babblebox bug when used in Internet Exploder.
- Updated the admin menu link to the main game page for the new path.
- Updated the link to the official DK forums in the Help file.

### 1.1.8 (2.6.2005) ###
- Added extra security to prevent SQL injection exploits.
- admin.php is now in the game root directory rather than the /admin/ sub.

### 1.1.7 (12.29.2004) ###
### Thanks to Adam. :)
- Fixed URL cheat that allowed people to continue fighting after victory.

### 1.1.6a (11.20.2004) ###
- Fixed problem where goldbonus was added to experience instead of gold.
- Fixed a typo in fight.php.

### 1.1.6 (11.6.2004) ###
### Thanks to Shadowbq, joshman, Adam, and Tsufo. :)
- Fixed variable name reference in fight.php.
- Fixed URL cheat that allowed people to buy any item from any town.
- Fixed URL cheat that allowed people to travel anywhere without having the map.
- Fixed display bug in the error messages generated by cheat attempts.
- Fixed admin/editlevels that caused all level values to be reset to zero.

### 1.1.5 (9.22.2004) ###
### Thanks to Adam and Shadowbq. :)
- Fixed Travel To cheat that allowed you to escape from fights.

### 1.1.4 (8.23.2004) ###
### Thanks to Gary13579 and Maebius. :)
- Fixed URL cheat that allowed people to get healed for free.
- Changes to make babblebox more secure from html/bbcode exploits.

### 1.1.3a (5.23.2004) ###
- Updated forum.php for use with new checkcookies() location.

### 1.1.3 (5.20.2004) ###
- Fixed several bugs related small bugs related to new version info location.
- Moved checkcookies() out of login.php, into cookies.php.
- Deleted admin/lib.php, moved requisite functions into standard lib.php.
- Fixed minor display bug in admin template.

### 1.1.2 (4.24.2004) ###
- Fixed bug with default spell/town field contents.
- Fixed bug with updating new spell on levelup.
- Updated help file to point to new forums address.
- Version info is now handled through lib.php, instead of config.php.

### 1.1.1 (3.1.2004) ###
- Fixed map buying bug.
- Fixed adminemail bug when sending email (tnx Mantagnana).

### 1.1.0 (2.27.2004) ###
### Thanks to Miker, Yop, Mantagnana & Maebius for bug reports & feature ideas. :)
- Added option to verify registration emails.
- Added options to turn off display of news/online/babblebox in towns.
- Added gameurl and adminemail fields to control table.
- Added ability to ban a user without deleting the account.
- Added rules for passwords (alphanumeric, maxlength=10).
- Added page where users can change their passwords.
- Added a page for lost passwords.
- Fixed bugs in users.php to use doquery() instead of mysql_query().
- Fixed bug in installer program when creating the admin user account.
- Changed the way towns and spells are handled in the user account.
- Removed some deprecated code from the onlinechar() function.

### 1.0.4 (2.14.2004) ###
### Thanks to Maebius & Mantagnana. :)
- Fixed babblebox bug.
- More checks to ensure experience/gold doesn't go over the database field limit.
- Fixed bug with dropcode and levelups.
- Added visual warning if your exp/gold are maxed out.
- Fixed minor experience bug in Extended Character Stats.
- Fixed minor display bug in admin template.

### 1.0.3 (2.6.2004) ###
### Thanks to Maebius for reporting these. :)
- Fixed problem with monster's turn in fight.php
- Once again tried to fix the paths bug, this time by eliminating it altogether.

### 1.0.2 (2.4.2004) ###
### Thanks to WolfSinger for reporting these. :)
- Fixed bug in installer that prevented it from working with MySQL 3.
- Fixed more bugs with random number generation.
- Hopefully fixed problem with paths on some systems. New variable in lib.php.

### 1.0.1 (1.29.2004) ###
- Added basic map popup.
- Added optional "call home" function to installer.
- Added checker to ensure install.php has been deleted before running.

### Final (1.24.2004) ###
- Added installer script.
- Added news posting to control panel.
- General cleanup, etc.

### RC2 (1.20.2004) ###
- A few more minor template changes.
- Fixed missing spells list in fight screen.
- Added ability to see character stats for Who's Online people.
- Added "Next Level" experience points in Extended Stats popup.
- Completely new and finalized Help section.

### RC1 Aero (1.16.2004) ###
- Fixed database to allow floats in difficulty mods.
- A couple minor template changes.
- Fixed bug that prevented med/hard difficulties from gaining experience.
- Fixed several small bugs with random number generation.
- Dying is now integrated into the fight screen for better user feedback.
- Fixed bug that allowed victory gold/experience exploit.
- Added internal forums.
- Added some admin options.
- Added user auth level (user/admin).
- Added Admin Control Panel.
- Fixed bug that allowed users to post blank messages in babblebox.
- Added option to close game during maintanence.
- Added administration control panel.

### Beta 3 Aqua (12.18.2003) ###
- Fixed problem with red status bars not showing up sometimes.
- Added control settings table for changing major game options.
- Altered several little chunks to accept values from controlrow instead of hard coding.
- Other minor changes to pull away from the hard-coded "Dragon Knight" name.
- Changes to map buying screen to include town coordinates.
- Added shoutbox + safety features to main town screen.
- Added Who's Online to main town screen.
- Added News box to main town screen.
- Picking a monster when a fight starts is now more efficient.
- Monsters now have a chance to get the first swing.
- Monsters now have a chance to block you from running away.

### Beta 2 Fira (12.14.2003) ###
- Fixed bug with special items to keep you from having more than your max HP/MP/TP when you get rid of the item.
- Fixed death so you now get back 25% of your HP.
- Added monster item drops.
- Rebalanced town TP price.
- Added TP price to map purchasing screen.
- Added output compression to save bandwidth.
- Added new HP/MP/TP status bars in rightnav.
- Rewrote explore.php to be more efficient & to help with the IE problem.
- Fixed buyback of old items to use whole numbers instead of fractions.
- Fixed IE problem that prevented/fuxx0r'd movement.

### Beta 1 Terra (11.22.2003) ###
- Complete engine rewrite. Numerous new features.

### Alpha 1 (9.19.2003) ###
- Initial public release.