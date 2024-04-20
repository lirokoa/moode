<?php
/**
 * moOde audio player (C) 2014 Tim Curtis
 * http://moodeaudio.org
 *
 * This Program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3, or (at your option)
 * any later version.
 *
 * This Program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

// PHP
const PHP_VER = '8.2';

// Log files
const MOODE_LOG = '/var/log/moode.log';
const AUTOCFG_LOG = '/var/log/moode_autocfg.log';
const AUTORESTORE_LOG = '/var/log/moode_autorestore.log';
const UPDATER_LOG = '/var/log/moode_update.log';
const PLAY_HISTORY_LOG = '/var/log/moode_playhistory.log';
const MOUNTMON_LOG = '/var/log/moode_mountmon.log';
const SHAIRPORT_SYNC_LOG = '/var/log/moode_shairport-sync.log';
const LIBRESPOT_LOG = '/var/log/moode_librespot.log';
const SPOTEVENT_LOG = '/var/log/moode_spotevent.log';
const SPSEVENT_LOG = '/var/log/moode_spsevent.log';
const SLPOWER_LOG = '/var/log/moode_slpower.log';
// MPD
const MPD_RESPONSE_ERR = 'ACK';
const MPD_RESPONSE_OK = 'OK';
const MPD_CONF = '/etc/mpd.conf';
const MPD_MUSICROOT = '/var/lib/mpd/music/';
const MPD_PLAYLIST_ROOT = '/var/lib/mpd/playlists/';
const MPD_LOG = '/var/log/mpd/log';
// SQLite
const SQLDB = 'sqlite:/var/local/www/db/moode-sqlite3.db';
const SQLDB_PATH = '/var/local/www/db/moode-sqlite3.db';
// Library/Playback
const LIBCACHE_BASE = '/var/local/www/libcache';
const ROOT_DIRECTORIES = array('NAS', 'SDCARD', 'USB');
const DEF_RADIO_TITLE = 'Radio station';
const DEF_RADIO_COVER = 'images/default-cover-v6.svg';
const DEF_COVER = 'images/default-cover-v6.svg';
const PLAYLIST_COVERS_ROOT = '/var/local/www/imagesw/playlist-covers/';
const RADIO_LOGOS_ROOT = '/var/local/www/imagesw/radio-logos/';
const LOGO_ROOT_DIR = 'imagesw/radio-logos/';
const TMP_IMAGE_PREFIX = '__tmp__';
const ALSA_PLUGIN_PATH = '/etc/alsa/conf.d';
const STATION_EXPORT_DIR = '/var/local/www/imagesw';
// Thumbnail generator
const THMCACHE_DIR = '/var/local/www/imagesw/thmcache/';
const THM_SM_W = 80; // Small thumbs
const THM_SM_H = 80;
const THM_SM_Q = 75;
// System files
const PORT_FILE = '/tmp/moode_portfile'; // Command engine
const SESSION_SAVE_PATH = '/var/local/php';
const DEV_ROOTFS_SIZE = 3670016000; // Bytes (3.5GB)
const LOW_DISKSPACE_LIMIT = 524288; // Bytes (512MB)
const BOOT_CONFIG_TXT = '/boot/firmware/config.txt';
const BOOT_MOODEBACKUP_ZIP = '/boot/moodebackup.zip';
const BOOT_MOODECFG_INI = '/boot/moodecfg.ini';
const BT_PINCODE_CONF = '/etc/bluetooth/pin.conf';
const ETC_MACHINE_INFO = '/etc/machine-info';

// SMB protocol versions
const SMB_VERSIONS = array(
    "2.02" => "2.0",
    "2.10" => "2.1",
    "3.00" => "3.0",
    "3.02" => "3.0.2",
    "3.11" => "3.1.1",
    "202" => "2.0",
    "210" => "2.1",
    "300" => "3.0",
    "302" => "3.0.2",
    "311" => "3.1.1"
);

// Boot config.txt managed lines
const CFG_HEADERS_REQUIRED = 5;
const CFG_MAIN_FILE_HEADER = '# This file is managed by moOde';
const CFG_DEVICE_FILTERS_HEADER = '# Device filters';
const CFG_GENERAL_SETTINGS_HEADER = '# General settings';
const CFG_DO_NOT_ALTER_HEADER = '# Do not alter this section';
const CFG_AUDIO_OVERLAYS_HEADER = '# Audio overlays';
const CFG_FORCE_EEPROM_READ = 'force_eeprom_read=0';
const CFG_FRAMEBUFFER_WIDTH = 'framebuffer_width=800';
const CFG_FRAMEBUFFER_HEIGHT = 'framebuffer_height=444';
const CFG_FRAMEBUFFER_ASPECT = 'framebuffer_aspect=-1';
const CFG_LCD_ROTATE = 'lcd_rotate=2';
const CFG_HDMI_ENABLE_4KP60 = 'hdmi_enable_4kp60';
const CFG_PCI_EXPRESS = 'pciex1';
const CFG_PCI_EXPRESS_GEN3 = 'pciex1_gen=3';
const CFG_DISABLE_BT = 'disable-bt';
const CFG_DISABLE_WIFI = 'disable-wifi';

// Features availability bitmask
// NOTE: Updates must also be made to matching code blocks in playerlib.js, sysinfo.sh, moodeutl, and footer.php
// sqlite3 /var/local/www/db/moode-sqlite3.db "SELECT value FROM cfg_system WHERE param='feat_bitmask'"
// sqlite3 /var/local/www/db/moode-sqlite3.db "UPDATE cfg_system SET value='97206' WHERE param='feat_bitmask'"
const FEAT_HTTPS		= 1;		// y HTTPS mode
const FEAT_AIRPLAY		= 2;		// y AirPlay renderer
const FEAT_MINIDLNA 	= 4;		// y DLNA server
const FEAT_RECORDER		= 8; 		//   Stream recorder
const FEAT_SQUEEZELITE	= 16;		// y Squeezelite renderer
const FEAT_UPMPDCLI 	= 32;		// y UPnP client for MPD
const FEAT_SQSHCHK		= 64;		// 	 Require squashfs for software update
const FEAT_ROONBRIDGE	= 128;		// y RoonBridge renderer
const FEAT_LOCALUI		= 256;		// y Local display
const FEAT_INPSOURCE	= 512;		// y Input source select
const FEAT_UPNPSYNC 	= 1024;		//   UPnP volume sync
const FEAT_SPOTIFY		= 2048;		// y Spotify Connect renderer
const FEAT_GPIO 		= 4096;		// y GPIO button handler
const FEAT_RESERVED		= 8192;		// y Reserved for future use
const FEAT_BLUETOOTH	= 16384;	// y Bluetooth renderer
const FEAT_DEVTWEAKS	= 32768;	//   Developer tweaks
const FEAT_MULTIROOM	= 65536;	// y Multiroom audio
//						-------
//						  97207

// Selective resampling bitmask
const SOX_UPSAMPLE_ALL			= 3; // Upsample if source < target rate
const SOX_UPSAMPLE_ONLY_41K		= 1; // Upsample only 44.1K source rate
const SOX_UPSAMPLE_ONLY_4148K	= 2; // Upsample only 44.1K and 48K source rates
const SOX_ADHERE_BASE_FREQ		= 8; // Resample (adhere to base freq)

// Album and Radio HD badge parameters
// NOTE: Mirrored in playerlib.js
const ALBUM_HD_BADGE_TEXT 			= 'HD';
const ALBUM_BIT_DEPTH_THRESHOLD 	= 16;
const ALBUM_SAMPLE_RATE_THRESHOLD 	= 44100;
const RADIO_HD_BADGE_TEXT 			= 'HiRes';
const RADIO_BITRATE_THRESHOLD 		= 128;

// MPD output names
const ALSA_DEFAULT			= 'ALSA Default';
const ALSA_BLUETOOTH		= 'ALSA Bluetooth';
const HTTP_SERVER			= 'HTTP Server';
const STREAM_RECORDER		= 'Stream Recorder';

// Audio output interfaces
const AO_HDMI = 'hdmi';
const AO_HEADPHONE = 'headphone';
const AO_I2S = 'i2s';
const AO_USB = 'usb';
const AO_TRXSEND = 'trxsend';

// Audio device names (Pi integrated audio)
const PI_HDMI1 = 'Pi HDMI 1';
const PI_HDMI2 = 'Pi HDMI 2';
const PI_HEADPHONE = 'Pi Headphone jack';

// ALSA max number of cards (4 USB, 3 Integrated, 1 I2S)
const ALSA_MAX_CARDS = 8;
// ALSA special device names
const ALSA_LOOPBACK_DEVICE = 'Loopback';
const ALSA_DUMMY_DEVICE = 'Dummy';
const ALSA_VC4HDMI_SINGLE_DEVICE = 'vc4hdmi';
const ALSA_EMPTY_CARD = 'empty';
// ALSA names that can't be set directly in Audio Config
const ALSA_RESERVED_NAMES = array(ALSA_LOOPBACK_DEVICE, ALSA_DUMMY_DEVICE);
// ALSA default mixer names
const ALSA_DEFAULT_MIXER_NAME_I2S = 'Digital';
const ALSA_DEFAULT_MIXER_NAME_INTEGRATED = 'PCM';
// ALSA output mode names
const ALSA_OUTPUT_MODE_NAME = array('plughw' => 'Default', 'hw' => 'Direct', 'iec958' => 'IEC958');
const ALSA_OUTPUT_MODE_BT_NAME = array('_audioout' => 'Standard', 'plughw' => 'Compatibility');
// ALSA HDMI IEC958
const ALSA_IEC958_DEVICE = 'default:vc4hdmi';
const ALSA_IEC958_FORMAT = 'IEC958_SUBFRAME_LE';

// Friendly name to display in Output device field in Audio Config
const TRX_SENDER_NAME = 'Multiroom sender';

// Source select devices
const SRC_SELECT_DEVICES = array(
    'HiFiBerry DAC+ ADC',
    'Audiophonics ES9028/9038 DAC'
);

// Library Saved Searches
const LIBSEARCH_BASE = '/var/local/www/libsearch_';
const LIB_FULL_LIBRARY = 'Full Library (Default)';

// Month names
const MONTH_NAME = array(
	'01' => 'January',
	'02' => 'February',
	'03' => 'March',
	'04' => 'April',
	'05' => 'May',
	'06' => 'June',
	'07' => 'July',
	'08' => 'August',
	'09' => 'September',
	'10' => 'October',
	'11' => 'Novenber',
	'12' => 'December'
);

// Recorder plugin (currently n/a)
const RECORDER_RECORDINGS_DIR 	 = '/Recordings';
const RECORDER_DEFAULT_COVER	 = 'Recorded Radio.jpg';
const RECORDER_DEFAULT_ALBUM_TAG = 'Recorded YYYY-MM-DD';
