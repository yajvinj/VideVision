# VideVision
Having an eye watch over you, when you aren't watching.

## Inspiration
We believe that people should be aware of real-time crime zones around cities before travelling to a certain place be it for work or a vacation. We want to make sure that everyone in the community stays safe and does not get caught in any violent accidents.  

## What it does
Our software gets the real-time locations of danger zones through image feed and updates the zones on a google map through heat-mapping. We created a database which stores coordinates of the danger zones and the activity which makes the zone unsafe. We used computer vision to detect the images and classifies them by returning tags as the output and thereby determining the probability of the of the situation being safe or unsafe. The web app combined with data visualization allows people to view real-time crime and danger zones in a particular place where an event took place..

## How we built it
We used HTML, CSS, and JavaScript with Google Maps APIs (elevation, geocoding, reverse-geocoding, heatmaps, and markers APIs) to create a visualization that highlights danger zones in a particular area. The heat map presentation of danger zones enables people to view the safety situation of the area before they plan to take a trip there.

## Challenges we ran into
We used Salesforce for the first time, and found it quite difficult to implement the database initially. Getting the right information from web entities and the tags returned by the google vision was a challenge for us.

## Accomplishments we are proud of
Even though we used Salesforce for the first time, we were able to create our database. In addition to that, we were able to modify our back-end to get the proper tags from the google vision api. We are content as we were able to successfully implement and embed the map with the danger zones’ heat signatures. 

## What we learned
We all learned new technical skills including working with asynchronous JavaScript requests, map analysis with GIS, and data visualization principles to present and highlight the most important information upfront so that the user quickly obtains the information for which they came for. We initially found it difficult to implement the Salesforce database, but after attending the workshops and seeking guidance from the mentors, we were able to implement it.

## What’s next for VideVision
We hope to continue to test our product by deploying it in various neighborhoods and getting feedback on our product from various people. A key feature that we would like to add is natural language processing(NLP) to filter out labels that is received from google cloud vision api. In addition, we would like to collaborate with various stakeholders such as corporate companies, universities and local government organizations to improve/implement our product on a larger scale. 
