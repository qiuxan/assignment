1> Student details : 

Name: XIAN QIU

ID: 152192

Campus: Launceston

2> Resources:

2.1 Date-picker:http://www.google.com.au/url?sa=t&rct=j&q=&esrc=s&source=web&cd=1&ved=0CC4QFjAA&url=http%3A%2F%2Fjqueryui.com%2Fdatepicker%2F&ei=6USXUZepA8SziQf5-ICQDw&usg=AFQjCNFzneSJbW5WjAr8-unpZ2lmuTAnJw&bvm=bv.46751780,d.aGc

2.2 Ajax: https://www.youtube.com/watch?v=BwExOhVaUyk

2.3 Pagination:https://www.youtube.com/watch?v=wd4fE5fk-fk

2.4 Hover and Radio Selection by clicking <tr>: Tutorial work

2.5 Some other jQuery/javascript:http://www.w3schools.com

2.6 DigitalColor Meter, Developed by Apple, is used to capture the color of demo:http://www.apple.com/au/osx/apps/all.html


3>Problem not able to solve:

Nothing so far.


4> System Manual:

4.0 VERY IMPORTANT: Admin ulevel=1 admin; General ulevel=2. Finished this part before the email,so it would be a little complicated to change this.

4.1 For the Edit button of 'User Management' page and Delete button of 'My Library' page, the 'right' way to check whether a radio is been selected is to use check() function of jQuery/ Javascript to check the .attr() of radio. However, I do it in a different way. I place two button on the location of Edit/Delete. One is fade button and the other is real. Fade button is shown and real button is hide at first. Once option has been made fade button would be hidden and real button will show up. If users click fade button before making choice, the "please choose xxx" alert will show up. If real button is clicked, updating data will be pushed into database. My way would looks a little bit stranger than the "right" way if stoping Javascript.

4.2 For the authentication form, to stop users from entering Mypage/Adminpage bu  directly entering URL, the system is using SESSION(According to Email of Prof.Kang). For that, Mypage,Adminpage and Addbook page can't be refreshed. If any developers want to make it refreshable, just simply put "$_SESSION['access']=1;" before "if($_SESSION['access']==1)" of the code of issued page.
 
4.3 For adding page, I make consider 2 inputed authors with the same 'first name','middle name','last name' and 'affiliation' as one author. For the publisher, 'publisher name' is the only condition for doing that.

4.4 The ajax of form validation : Using Ajax jQuery post the inputted data to validation.php, and then validation.php will response the result in html and if everything is correct it will update data into database. All the html content will be put behind require files and the success-updating information area, and then I used hide() of jQuery to  hide all irrelevant information. The full response(a series of html content) of validation.php can be seen from console of Firefox or Google Chrome. ** THIS IS JUST for the convenience of tutor's checking and debugging! If it is not suitable, just delete line 163 ,"console.log(response);", of "updatecontent.php". By doing that user will not be able to see the full response of Ajax page.

4.5 For 'my page', every 'Required' field will present red 'require' after submit button being clicked, except the Birth Date field. The red 'require' will be present directly if Birth date field is empty as the cursor leave the text area. This is what Demo looks like to me, so I just did what is asked to be done.

4.6 The user name 'admin' is already taken, the password of this account is '123123'.


Thank you for reading,

Xian Qiu

Saturday,May 18,2013