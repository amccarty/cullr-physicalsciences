#!/bin/bash

pushd /cullr/instances/engineering/solr_add/

for bib in bibids/*.xml
do
/cullr/instances/physicalsciences/cullr_physicalsciences/scripts/physicalsciences_postx.sh "$bib"
done

popd
