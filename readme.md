# RazorPay Webhook Manager

Razor Pay Webhook Manager is small package to control and save Webhook responses send after a transaction takes place on a RazorPay Payment gateway.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

create a Razorpay account
Use your app key and app secret from Razorpay dashboard
or create one if you don't have any to create the checkout forms   
use the above mentioned steps
or follow the Detailed steps are given in the Razorpay documentation for creating the checkout form https://docs.razorpay.com/docs/getting-started
here is the link to the documentation for installing the razorpay
https://github.com/razorpay/razorpay-php
```
use composer by writing the command composer require razorpay/razorpay:2.*  
```
* or else go to https://github.com/razorpay/razorpay-php/releases download the razorpay-php.zip file and include Razorpay.php into your application and you will be able to use the razorpay api for creating the payment checkout form

### Installing

A step by step series of examples that tell you how to get a development env running

Steps:
* Download the repository
* Go to Razorpay Dashboard->Settings->Webhooks,
* Setup the webhook url for your razorpay payment and check the Active box and the Active
  Events corresponding to the events for which you want to receive the notification.
* In case of this repository for each razorpay payment a json response is received at router.php.
* Now whenever you make a payment using the razorpay payment gateway a http post request is receive
  at the webhook url that is set in the dashboard.

For sample webhooks payload you can refer to https://razorpay.com/docs/webhooks/webhook-payloads/


Example:
```
Webhook Url: https://router.php
```
* In this Example you will recieve a json response payload whenever you make a razorpay payment at
  the mentioned webhook url.
* Various http post response payloads are handled respectively using their respective file in the
  tables directory
* And it has a directory named driver which has a file named sqlHelper.php which takes care of
  sql query and insertion of data into their respective table
* settings directory contains all the utility files for fetching the response payload
  in payloadProcessor.php,
* sql directory contains a file Webhook.sql which contains the database required to store the
  respective payload response received for different events from the razorpay payment

* Making connection to the database using connect.php,
in case of insertion error saveWebhookData.php is used to store the response data as a text file inside a folder named dataAsTextFile

```
### Sample Json for Payment Authorised
{
  "event": "payment.authorized",
  "entity": "event",
  "contains": [
    "payment"
  ],
  "payload": {
    "payment": {
      "entity": {
        "id": "pay_6X6jcHoHdRdy79",
        "entity": "payment",
        "amount": 50000,
        "currency": "INR",
        "status": "authorized",
        "amount_refunded": 0,
        "refund_status": null,
        "method": "card",
        "order_id": "order_6X4mcHoSXRdy79",
        "card_id": "card_6GfX4mcIAdsfDQ",
        "bank": null,
        "captured": true,
        "email": "gaurav.kumar@example.com",
        "contact": "9123456780",
        "description": "Payment Description",
        "error_code": null,
        "error_description": null,
        "fee": 200,
        "service_tax": 10,
        "international": false,
        "notes": {
          "reference_no": "848493"
        },
        "vpa": null,
        "wallet": null
      }
    },
    "created_at": 1400826760
  }
}
```

End with an example of getting some data out of the system or using it for a little demo

## Running the tests

Make a Razorpay payment using the gateway and you can see the data will get inserted into the database

### Break down into end to end tests

Explain what these tests test and why

```
Give an example
```

### And coding style tests

Explain what these tests test and why

```
Give an example
```

## Deployment

Add additional notes about how to deploy this on a live system

## Built With

* [Dropwizard](http://www.dropwizard.io/1.0.2/docs/) - The web framework used
* [Maven](https://maven.apache.org/) - Dependency Management
* [ROME](https://rometools.github.io/rome/) - Used to generate RSS Feeds

## Contributing

Please read [CONTRIBUTING.md](https://gist.github.com/PurpleBooth/b24679402957c63ec426) for details on our code of conduct, and the process for submitting pull requests to us.

## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://github.com/your/project/tags).

## Authors

* **Billie Thompson** - *Initial work* - [PurpleBooth](https://github.com/PurpleBooth)

See also the list of [contributors](https://github.com/your/project/contributors) who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Acknowledgments

* Hat tip to anyone whose code was used
* Inspiration
* etc
