/**
 * SetController
 *
 * @description :: Server-side logic for managing sets
 * @help        :: See http://links.sailsjs.org/docs/controllers
 */

module.exports = {

    index: function (req, res) {

        Set.find().exec(function(err, sets) {
            if (err) {
                res.badRequest('There was an error. Please try again.', 'set/index');
            } else {
                if (sets.length === 0) {
                    res.notFound('No sets found in database', '404');
                } else {
                    res.ok({sets: sets}, 'set/index');
                }
            }
        });

    },

    show: function (req, res) {

        var setId = req.param('setId');

        Set.findOne({ id: setId }).exec(function(err, set) {
            if (err) {
                res.badRequest('There was an error. Please try again.', 'set/show');
            } else {
                if (!set){
                    res.notFound('Set does not exist', '404');
                } else {
                    res.ok({set: set}, 'set/show');
                }
            }
        });

    }

};

