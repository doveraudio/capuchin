
STEPS REQUIRED:
TAKE INPUT FILE, TABLENAME, AND MAP-FILE;
READ TABLE, FILL COLUMN NAMES INTO KEY VALUE STORE #1
READ CSV FILE, MAP COLUMNS TO KEY VALUE STORE #2
READ MAP FILE, MAP STRING TUPLES AS CSV COLUMN TO SQL COLUMN (#2 => #1)





relevant tables:

enterprises => provides the main information for each "producer", essentially is "producer", as reffered to in producer_property.rb, 
spree_addresses => supplies address_id to enterprises,

