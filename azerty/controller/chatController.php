<?php

require_once dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'Database.php';

class chat
{

    public $database;
    public $verification = array();

    public function __construct()
    {
        $this->database = new Database(URL, USERNAME, PASSWORD);
    }

    public function getConvMessage($idUser, $idOtherUser)
    {
        $cptr = 0;

        $messages = $this->database->getConvMessage($idUser, $idOtherUser);

        foreach ($messages as $message) {
            if ($message['idExpediteur'] == $idUser) { ?>

                <div class="message-in">
                    <p><?= $message['message']?></p>
                </div>
                <!-- <p style="color: #ececec;padding: 5px 5px 5px 10px;font-size: 10px;"><?= self::timeHandeler($message['date']) ?></p> -->

            <?php
            } elseif ($message['idExpediteur'] != $idUser) { ?>

                <div class="message-in">
                    <p><?= $message['message']?></p>
                </div>
                <!-- <p style="color: #ececec;padding: 5px 5px 5px 10px;font-size: 10px;"><?= self::timeHandeler($message['date']) ?></p> -->

                <?php
                if ($cptr == 0) {
                    $this->database->updateView($idUser, $idOtherUser);
                    $cptr++;
                }
            } else { ?>

            <div class="message-out">
                <p><?= $message['message']?></p>
            </div>
            <!-- <p style="color: #333;padding: 5px 5px 5px 10px;font-size: 10px;"><?= self::timeHandeler($message['date']) ?></p> -->

        <?php
                if ($cptr == 0) {
                    $this->database->updateView($idUser, $idOtherUser);
                    $cptr++;
                }
            }
        }

        ?>

        </div>

<?php }

    public function sendMessage($idExpediteur, $idDestinataire, $message)
    {
        $date = time();
        $vu = 0;
        $message = trim(nl2br(htmlspecialchars($message)));
        $this->database->sendMessage($idExpediteur, $idDestinataire, $message, $date, $vu);
    }

    public function timeHandeler($temps)
    {
        $years = $temps;
        $temps = time() - $temps;

        if ($temps < 60) {
            $final = 'A l\'instant';
        } elseif ($temps < 3600) {
            $final = 'Il y a ' . intval(date('i', $temps)) . 'min';
        } elseif ($temps < 86400) {
            $final = 'Il y a ' . intval(date('H', $temps)) . 'h';
        } elseif ($temps < 259200) {
            $final = 'Il y a ' . intval(date('d', $temps)) . 'j';
        } elseif ($temps < 31536000) {
            $final = 'Depuis le ' . date('d M', $years);
        } else {
            $final = 'Depuis le ' . date('d M Y', $years);
        }

        return $final;
    }
}
?>