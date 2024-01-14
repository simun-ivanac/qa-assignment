<div id="top"></div>

# Table of contents
1. [Intro](#intro)
2. [Environment](#environment)
3. [Project installation](#project-installation)
	1. [Theme setup](#theme-setup)
	2. [Plugin setup](#plugin-setup)
4. [Removing files](#removing-files)

<br>

<div id="intro"></div>

# Intro

Repository contains only relevant files. All excluded files are simply part of default WP installation.
After git initialization, all the changes are merged using PRs. If you wish to see them, go <a href="https://github.com/simun-ivanac/qa-assignment/pulls?q=is%3Apr+is%3Aclosed" target="_blank">here</a>.

<div align="right">

[Top](#top)

</div>

<div id="environment"></div>

## Environment:
- WordPress: 6.4.2 (newest)
- PHP: 8.0.29
- Node: 16.20.0
- NPM: 8.19.4
- WP-CLI: 2.8.1
- Composer: 2.5.8
- MySQL: 8.0.33

<div align="right">

[Top](#top)

</div>


<div id="project-installation"></div>

## Project installation
```
git clone https://github.com/simun-ivanac/qa-assignment.git
```

Copy *themes/qa-assignment* folder into *themes* folder inside your active WP installation.

Copy *plugins/movies* folder into *plugins* folder inside your active WP installation.

<br>

<div id="theme-setup"></div>

### Theme setup:
go to *themes/qa-assignment* folder and run:

```
composer dump-autoload -o
```

activate theme:
```
wp theme activate qa-assignment
```
<br>

<div id="plugin-setup"></div>

### Plugin setup:
go to *plugins/movies* folder and run:

```
composer dump-autoload -o
```

```
npm install
```

```
npm run build:custom-directory
```

activate plugin:
```
wp plugin activate movies
```

```
wp rewrite flush
```

<br>
<br>

That's all, stop here! Happy exploring.

<div align="right">

[Top](#top)

</div>

<br>

---

<div id='removing-files'></div>

## Removing files:
If you wish to remove theme, make sure some other theme is activated before running command.
- wp theme delete qa-assignment

<br>

Because of node_modules, removing the plugin might take a few moments.
- wp plugin deactivate movies
- wp plugin delete movies
- wp rewrite flush

<div align="right">

[Top](#top)

</div>
