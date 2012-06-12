#!/bin/bash

pushd /cullr/instances/physicalsciences/solr_add/bibids/

shopt -s nullglob
for bib in *.xml
do
/cullr/instances/physicalsciences/cullr_physicalsciences/scripts/physicalsciences_postx.sh "$bib"
done

popd
