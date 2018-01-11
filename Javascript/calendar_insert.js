/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function insertCalendarContent(content_array, number)
{
   
   var content = content_array[number];
    if(document.getElementById)
    {
        document.getElementById('calendar_content').innerHTML = content;
				
    }
    else if(document.all)
    {
	document.all('calendar_content').innerHTML = content;
				
    }
}