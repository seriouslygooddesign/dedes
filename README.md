# How to use Dedes theme 

## 1. Install

1. install node.js - https://nodejs.org/
2. install all dependencies - open terminal, make sure current path is the root folder and run "npm i" command with no brackets.

## 2. Two Comands

npm run dev - for development. Watch all files in assets/src and compile unminified CSS and JS files in asses/dist in real time. Change the localDomain variable in webpack.config.js to your current website url.

npm run build - before pushing live. Compile once all files from assets/src into minified CSS and JS files in asses/dist.

rerun the command after changing webpack.config.js.

to stop "npm run dev" command press twice:
cmd+c (MAC) or ctrl+c (WIN).

## 3. File Strucure

input js and scss - src

output js and css - dist

DO NOT DELETE any of these files:

- package-lock.json
- package.json
- postcss.config.js
- webpack.config.js
