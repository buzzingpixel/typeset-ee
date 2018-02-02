#!/usr/bin/env bash

#
# This shell script builds the current version from the current branch
#
#
# REQUIREMENTS
#
# - Mac: brew install jq
# - Ubuntu: sudo apt-get install jq zip unzip
#
#
# USAGE
#
# - Run the command: chmod +x make.sh; ./make.sh
#

# Make sure composer dependencies are installed without dev dependencies
echo 'Making composer dependencies are installed without dev dependencies...';
rm -rf vendor;
composer install --no-dev;

# Get the software name
name=($(jq -r '.extra.handle' composer.json));

# Get the software version
version=($(jq -r '.version' composer.json));

# Make build directory
echo 'Making build directory...';
mkdir -p localStorage/build/system/user/addons;

# Copy items to the build directory
echo 'Copying files to the build directory...';
cp -r typeset localStorage/build/system/user/addons/;
cp -r vendor localStorage/build/system/user/addons/typeset;
cp -r license.md localStorage/build/system/user/addons/typeset/license.md;
cp -r license.md localStorage/build/license.md;

# Create the distribution file
echo 'Creating distribution zip file..';
cd localStorage/build;

# Zip it all up
zip -rq ../"$name"-"$version".zip system/ license.md -x "*.DS_Store" "*.gitkeep";

# Delete the build directory
echo 'Deleting build directory...';
cd ../;
rm -r build/;
cd ../;

# Re-installing composer dependencies with dev dependencies
echo 'Re-installing composer dependencies with dev dependencies...';
rm -rf vendor;
composer install;

# We're done here
echo "$name-$version.zip has been created.";
