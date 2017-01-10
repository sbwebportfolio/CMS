# SiteTemplate

A minimalistic CMS made for CodeIgniter.

# Installation

### Prerequisites
- [CodeIgniter 3](https://codeigniter.com/)
- [Ion Auth 2](https://github.com/benedmunds/CodeIgniter-Ion-Auth)

### Setup
1. Copy all files from the CMS to the site directory.
1. Execute the SQL code from sql/controlpanel.sql.
1. Change the autoload configuration (application/config/autoload.php) to add 'ion_auth' to libraries, 'url' to helper files and 'control_panel' to config files.