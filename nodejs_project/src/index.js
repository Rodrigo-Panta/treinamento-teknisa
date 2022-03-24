const express = require('express');
const bodyParser = require('body-parser');
const programmer = require('./database/tables/programmers');

const app = express();
const port = 5000;

app.use(bodyParser.json());

app.get('/', (req, res) => {
    res.sendFile('index.html', {root:__dirname});
});

app.listen(port, () => {
    console.log(`Now listening on port ${port} `);
});

app.get('/syncDatabase', async (req, res) => {
    const database = require('./database/db');
   
    try {
      await database.sync();
   
      res.send(`Database succesfully sync'ed`);
    } catch (error) {
      res.send(error);
    }
});

app.post('/createProgrammer', async (req, res) => {
    try {
        const params = req.body;

        const properties = ['name', 'python', 'java', 'javascript'];

        validateProperties(properties, params, 'every');

        const newProgrammer = await programmer.create({
            name: params.name,
            python: params.python,
            javascript: params.javascript,
            java: params.java
        });

        res.send(newProgrammer);
    } catch (error) {
        res.send(error);
    }
});

app.get('/retrieveProgrammer', async (req, res) => {
    try {
      const params = req.query;
   
      if ('id' in params) {
        const record = await programmer.findByPk(params.id);
   
        if (record) {
          res.send(record);
        } else {
          res.send('No programmer found using received ID');
        }
   
        return;
      }
   
      const records = await programmer.findAll();
   
      res.send(records);
    } catch (error) {
      res.send(error);
    }
  });

  app.put('/updateProgrammer', async (req, res) => {
    try {
      const params = req.body;
      
      const record = await validateId(params);
      
      const properties = ['name', 'python', 'java', 'javascript'];
   
      validateProperties(properties, params, 'some');
   
      record.name = 'name' in params ? params.name : record.name;
      record.python = 'python' in params ? params.python : record.python;
      record.java = 'java' in params ? params.java : record.java;
      record.javascript = 'javascript' in params ? params.javascript : record.javascript;
   
      await record.save();
   
      res.send(`${record.id} ${record.name} - Updated successfully`);
    } catch (error) {
      res.send(error);
    }
  });
  
  app.delete('/deleteProgrammer', async (req, res) => {
    try {
      const params = req.body;
   
      const record = await validateId(params); 
   
      await record.destroy();
   
      res.send(`${record.id} ${record.name} - Deleted successfully`);
    } catch (error) {
      res.send(error);
    }
  });

  const validateId =  async (params) => {
    try {
      if (!('id' in params)) {
        throw(`Missing 'id' in request body`);
      }
   
      const record = await programmer.findByPk(params.id);
   
      if (!record) {
        throw(`Programmer ID not found.`);
      }

      return record;

    } catch (error) {
      throw error;
    }
  }

  const validateProperties = (properties, params, fn) => {
    try {
      const check = properties[fn]((property) => {
        return property in params;
      });
   
      if (!check) {
        const propStr = properties.join(', ');
        throw(`Request body doesn't have any of the following properties: ${propStr}`);
      }
      return true;
    } catch (error) {
      throw error;
    }

  }