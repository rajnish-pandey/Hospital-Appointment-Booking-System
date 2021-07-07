# Hospital-Appointment-Booking-System
A web based application for Hospital Management. Using this application patients can book their appointment from doctors of reputed hospitals.
At the same, the hospitals will also be able to see the appointments of the patients, by selecting a appointment ID.
The appointment ID will be randomly generated when an appointment is being booked.

Before booking the appointment, the patients can see the details of the doctors, and book the appointment accordingly.

Also, the patient may book(sign up) for a hospital to receive timely updates, about information related to health. After this, the 
hospital can mail the related information to the patients.


Salient features of our project are as follows:-
1. Patient has to sign up with a user name(emailId) and password to proceed further.
2. After signing up, his/her account is created and now he/she can login using the same username and password.
(It has been ensured that no duplicate account is created using the same email id)
3.After Loging In, the patient can enter his details and select the doctor as per his/her requirements.
4. On submitting the Appointment form, a mail will be sent to the registered mail I'd, with complete details of the Appointment.
5. Administrator can login through a separate window to see all the appointments.
6. After loging in, administrator can delete any appointment, as per needed.(suppose the appointment gets over).
7. Registered patients also get an option to sign up to the regular updates(weekly/monthly) newsletters.
8. After signup, the users can also sign out anytime from the newsletter.
9. If a patient feels, he/she can also delete his account by entering the mail I'd and password.


Members and their roles:
Role of Rajnish Pandey:
1. Built appointment booking form html page.
2. Implemented weekly newsletter to recieve health related tips using MailChimp api, node, and working backend part of it.

Role of Sohini Ghosh:
1. Complete front end development of the Login/SignUp page, Delete appointment page, Hospital login page.
2. The CSS, JS files was also created by Sohini.

Role of Bishwayan Ghosh:
1. All the backend tasks like recording the registrations and deletions of new users and their appointments.
2. Minor modifications in front end of pages: 'bookapt.php', 'del.php' and 'hospitallogin.php'.
