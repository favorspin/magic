/**
* WantList.js
*
* @description :: TODO: You might write a short summary of how this model works and what it represents here.
* @docs        :: http://sailsjs.org/#!documentation/models
*/

module.exports = {

    attributes: {

        user        : { model: 'user' },
        card        : { model: 'card' },
        condition   : { model: 'condition' },
        qty         : { type: 'integer'}

    }
};

