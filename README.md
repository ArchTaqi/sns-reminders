# SMS reminders Using [Amazon SNS][1]

### Getting Started

1. If you haven't already, you'll want to sign up for AWS and [SNS][2].
2. Head over to your [IAM console][4], add a user called "sns-reminders", with "Programmatic access" is checked, attaching the policy `AmazonSNSFullAccess` and get the `Access key ID` and `Secret access key`.
3. Create a new topic with `{'name':'sns-reminders', 'Display Name':'REMINDERS'}` and then subscribe your mobile number to that topic. Get the topic details "Topic ARN" and "Region".
4. create a `credentials` file at `~/.aws/` and `chmod 600 credentials`, and then you can copy and paste the `aws_access_key_id` and `aws_secret_access_key` to replace their placeholders in your `~/.aws/credentials` file.

```
[sns-reminders]
aws_access_key_id = YOUR_AWS_ACCESS_KEY_ID
aws_secret_access_key = YOUR_AWS_SECRET_ACCESS_KEY
```
5. Now let's send our first message! Open the project folder in your command line and type the following command:
```
    $ php send.php "Walk your dogs now!"
```

6. Cron Your Way to Good Habits
```
    $ crontab -e
     0  10  *   *   *   php ~/sns-reminders/send.php "Walk your dogs now!" &gt;&gt; ~/sns-reminders/cron.log 2&gt;&amp;1
```

[1]: http://aws.amazon.com/sns/
[2]: http://aws.amazon.com/sns/getting-started/
[3]: http://docs.aws.amazon.com/aws-sdk-php/v3/guide/guide/credentials.html#using-the-aws-credentials-file-and-credential-profiles
[4]: https://console.aws.amazon.com/iam/home#users
[Source](https://deliciousbrains.com/amazon-sns-good-habits-daily-sms-reminders/ "Permalink to Using Amazon SNS to build good habits with daily SMS reminders")
