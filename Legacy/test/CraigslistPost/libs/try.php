


<?xml version="1.0"?>

<rdf:RDF xmlns="http://purl.org/rss/1.0/"
         xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
         xmlns:cl="http://www.craigslist.org/about/cl-bulk-ns/1.0">

  <channel>
    <items>
      <rdf:li rdf:resource="NYCBrokerHousingSample1"/>
      <rdf:li rdf:resource="NYCBrokerHousingSample2"/>
    </items>

    <cl:auth username="listuser@bogus.com"
             password="p0stp@rty"
             accountID="14"/>
  </channel>

  <item rdf:about="NYCBrokerHousingSample1">
    <cl:category>fee</cl:category>
    <cl:area>nyc</cl:area>
    <cl:subarea>mnh</cl:subarea>
    <cl:neighborhood>Upper West Side</cl:neighborhood>
    <cl:housingInfo price="1450"
                    bedrooms="0"
                    sqft="600"/>
    <cl:replyEmail privacy="C">bulkuser@bulkposterz.net</cl:replyEmail>
    <cl:brokerInfo companyName="Joe Sample and Associates"
                   feeDisclosure="fee disclosure here" />
    <title>Spacious Sunny Studio in Upper West Side</title>
    <description><![CDATA[
      posting body here
    ]]></description>
  </item>

  <item rdf:about="NYCBrokerHousingSample2">
    <cl:category>fee</cl:category>
    <cl:area>nyc</cl:area>
    <cl:subarea>mnh</cl:subarea>
    <cl:neighborhood>Chelsea</cl:neighborhood>
    <cl:housingInfo price="2175"
                    bedrooms="1"
                    sqft="850"
                    catsOK="1"/>
    <cl:mapLocation city="New York"
                    state="NY"
                    crossStreet1="23rd Street"
                    crossStreet2="9th Avenue"
                    latitude="40.746492"
                    longitude="-74.001326"
    />
    <cl:replyEmail privacy="C" 
                   otherContactInfo="212.555.1212">
      bulkuser@bulkposterz.net
    </cl:replyEmail>
    <cl:brokerInfo companyName="Joe Sample and Associates"
                   feeDisclosure="fee disclosure here" />
    <title>1BR Charmer in Chelsea</title>
    <description><![CDATA[
      posting body goes here
    ]]></description>
    <cl:PONumber>Purchase Order 094122</cl:PONumber>
  </item>
</rdf:RDF>


