#! /bin/bash

rm -rf ../assets/js/*
rm -rf ../assets/css/*
npm run build
mv ../assets/runtime.js ../assets/js/runtime.js
rm ../assets/manifest.json
rm ../assets/entrypoints.json