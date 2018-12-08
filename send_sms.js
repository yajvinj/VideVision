const accountSid = 'AC3c4c3ffcbedaa2357041399ba0a42c51';
      const authToken = 'e0c29a99efc06ee5ec82a5df1994bb0d';
      const client = require('twilio')(accountSid, authToken);

      client.messages
      .create({from: '+19375193594', body: 'body', to: '+19784571217'})
      .then(message => console.log(message.sid))
      .done();