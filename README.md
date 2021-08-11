# Somerset Advanced Motorcyclists

Version: 1.1.1

The WordPress theme for the Somerset Advanced Motorcyclists website.

Please refer to the [CONTRIBUTING.md](./CONTRIBUTING.md) if you wish to improve this project.

## **Installation**

> Disclaimer: this setup was built for use with OS X so you may need to adjust as necessary if you encounter any issues using a different system.

### Required assets in order to run the boilerplate

- [Install node](http://nodejs.org/download/)
- [Install yarn](https://yarnpkg.com/en/)
- [Install gulp](https://github.com/gulpjs/gulp/blob/master/docs/getting-started.md)
- [Install sass](http://sass-lang.com/install)
- [Install sass globbing](https://github.com/chriseppstein/sass-globbing)

### Setup process

1. Clone the repository and fire up a terminal window inside the root folder

2. Type the following command:

```
yarn
```
3. The yarn command should install without error. Next, run:

```
yarn run
```
You will then be presented with the development scripts you have available to run.

* **Build** - This is a one-time run script which generates all of the assets. This script is mainly run in the post-deploy process.
* **Watch** - This enables the watch task on all assets, and triggers LiveReload.
* **Modernizr** - This is a dedicated script which runs Modernizr. Remember to manually add your test conditions to the `gulpfile`

---

To run one of the above tasks, re-run the `yarn run` command and add the task name, for example:

```
yarn run watch
```

## **Optional Extras**

### Live Reload

In order to use live reload, you need to install the browser-extension. We use [Chrome](https://chrome.google.com/webstore/detail/livereload/jnihajbhpnppcggbcgedagnkighmdlei?hl=en).

### Modernizr

Modernizr functionality is provided in this boilerplate. Modernizr doesn't work inside the `watch` script. Instead you need to manually set the tests you want to add inside the gulpfile then use the `modernizr` script to run.

---

## **Asset Structure**

We take inspiration from the [SMACSS architecture](https://smacss.com/).

- **Base** - Base elements and utilities
- **Layout** - Spacing, major UI components, and layout structures
- **Modular** - All repeatable UI components
- **Tools** - Setup, Variables, Mixins, Fonts, Grid

---

## **Icons**

- All of our SVG's are first run through [SVGOMG](https://jakearchibald.github.io/svgomg/) to optimise them.
- Then they are sorted between being part of the icon-system or to be used as an image.
	- The icon-system is filled with re-usable icons that are modifiable via CSS.
	- To add to the icon-system the SVG must be placed at `/src/images/icons/` and then you run `gulp svgstore`

---

## **HTACCESS**

This section contains optional snippets of code that can be added to the root `.htaccess` file.

### Maintenance

The first line of this specifies that when the server is throwing a 503 error, the `maintenance.html` should be served.

The remaining lines are prefixed with a # to denote they are commented out. Removing the hashes will throw a 503 and force a redirect to the maintenance page - while ignoring The Idea Bureau Studio's IP address.

```
ErrorDocument 503 /maintenance.html

# RewriteEngine On
# RewriteBase /
# RewriteCond %{REMOTE_ADDR} !^81\.174\.165\.192$
# RewriteCond %{REQUEST_FILENAME} !-f
# RewriteCond %{REQUEST_FILENAME} !-d
# RewriteRule .* /maintenance.html [R=503,L]
```
