/**
 * MessageController
 *
 * @description :: Server-side logic for managing messages
 * @help        :: See http://links.sailsjs.org/docs/controllers
 */

module.exports = {

    compose: function(req,res) {

        var fromId = req.param('from');
        var to = req.param('to');
        if (req.param('subject')) {
            var subject = req.param('subject');
        } else {
            var subject = 'No Subject';
        }
        var message = req.param('message');
        if (req.param('inReplyTo')) {
            var inReplyTo = req.param('inReplyTo');
        } else {
            var inReplyTo = null;
        }

        User.findOne({username: to}).exec(function(err,result) {
            if (err) {
                res.badRequest('There was an error. Please try again.', 'message/compose');
            } else {
                if (!result) {
                    res.badRequest('User doesn\'t exist. Please try again.', 'message/compose');
                } else {
                    var toId = result.id;

                    Message.create({
                        receiver    : toId,
                        sender      : fromId,
                        subject     : subject,
                        message     : message,
                        read        : 0,
                        inReplyTo   : inReplyTo
                    }).exec(function(err,result) {
                        if(err) {
                            res.badRequest('There was an error. Please try again.', 'message/compose');
                        } else {
                            res.redirect(sails.getBaseurl() + '/message?receiver=' + fromId);
                        }
                    });
                }
            }
        });


    }

};

