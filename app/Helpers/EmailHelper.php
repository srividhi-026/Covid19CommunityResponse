<?php
/**
 * Email Helper
 *
 * @category Helpers
 * @package  CCR
 * @author   Srividhya Vengadesan <sriv@quickminutes.com>
 * @access   Restricted
 */

use Weblee\Mandrill\Mail;
use Illuminate\Support\Facades\Log;

if (! function_exists('template_item')) {
    /**
     * Helper function to add items to mandrill api call
     *
     * @param $name - The name given to template item within mandrill
     * @param $content - The content to display
     * @return array The item to add within the template
     */
    function template_item ($name, $content) {
        $item['name']    = $name;
        $item['content'] = $content;

        return $item;
    }
}

if (! function_exists('send_mandrill_email')) {

    /**
     * Function to send an email from the DashBoost system.
     *
     * @param $parameters
     */
    function send_mandrill_email ($parameters,  $attachment = '') {
        try {
            $ip_pool = 'Main Pool';

            // create the message data.
            $message = array(
                'subject'      => $parameters['subject'],
                'from_email'   => $parameters['from_email'],
                'from_name'    => $parameters['from_name'],
                'track_opens'  => True,
                'track_clicks' => True,
                'global_merge_vars' => $parameters['template_data'],
                'to' => array(
                    array(
                        'email' => $parameters['to_email'],
                        //'name'  => ucfirst($parameters['to_name']),
                        'type'  => 'to'
                    )
                ),
                'headers' => array('Reply-To' => isset($parameters['reply_to']) ? $parameters['reply_to'] : ''),
            );

            if($attachment){
                $message['attachments'] = array(
                    array(
                        'type'    => $attachment['type'],
                        'name'    => $attachment['name'],
                        'content' => $attachment['content']
                    )
                );
            }

            // send the email.
           $result = \MandrillMail::messages()->sendTemplate($parameters['template_name'], [], $message, $async = true, $ip_pool);
        }
        catch (Exception $e) {
             Log::error('A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage());
        }

        return;
    }
}
