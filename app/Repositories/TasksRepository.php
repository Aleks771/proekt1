<?php
namespace App\Repositories;
use Illuminate\Database\Elobuent\Collection;


class TasksRepository extends CoreRepository
{
    /**
     * Получаем данные с ZOHO CRM
     */
    public function readZoho()
         {
             /**
              * получить обновляемый токен доступа (access_token)
              */
             $refresh_token = '1000.3d9216fe7b58b4c40e6fed187d5b6cd4.6b04c41d70c7adb3b3a72eb496b6f9e1';
             $client_id = '1000.M1WJPO6QSKVIV6TG1V5PHBN1B0KT8Z';
             $client_secret = '08b685f763d31278fcecda9f09760c61765cc3e417';

        $access_token_url = 'https://accounts.zoho.com/oauth/v2/token?refresh_token=' . $refresh_token . '&client_id=' . $client_id . '&client_secret=' . $client_secret .'&grant_type=refresh_token';

// Создаём и запускаем функцию для передачи данных и заголовков на сервер, чтобы в ответ получить обновленный токен доступа (access_token).
        function generate_access_token($url){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            $result = curl_exec($ch);
            curl_close($ch);
            return json_decode($result)->access_token;
        }
        $GLOBALS['access_token'] = generate_access_token($access_token_url); //Записываем токен доступа в переменную "$access_token".
//       var_dump($GLOBALS['access_token']); // Проверим есть-ли у нас токен доступа - выводим его на экран

        /**
         * Получаем данные из ZOHO CRM на примере ZOHO-модуля "Контрагенты"
         */
        function get_records(){
            $access_token = $GLOBALS['access_token']; // Сюда вставляем обновленный токен доступа "access token" (см. код выше).

            // Делаем передачу данных и заголовков на сервер методом POST, чтобы в ответ получить данные из ZOHO CRM.
            $token_url = 'https://www.zohoapis.com/crm/v2/Deals'; //URL-адреса для запроса

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $token_url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array( 'Authorization: Zoho-oauthtoken ' . $access_token,
                'Content-Type: application/x-www-form-urlencoded' ));
            $response = curl_exec($ch);
            $response = json_decode($response);
//            echo '<pre>';  print_r($response); // Проверим есть ли у нас данные с сервера - выводим их на экран
            return $response;
        }
        $sdelky = get_records();
        return $sdelky;
         }







    /**
     * Передаём данные в ZOHO CRM
     */
    public function recordZoho($dataform)
    {
        $GLOBALS['dataform'] = $dataform;

        /**
         * получить обновляемый токен доступа (access_token)
         */
        $refresh_token = '1000.3d9216fe7b58b4c40e6fed187d5b6cd4.6b04c41d70c7adb3b3a72eb496b6f9e1';
        $client_id = '1000.M1WJPO6QSKVIV6TG1V5PHBN1B0KT8Z';
        $client_secret = '08b685f763d31278fcecda9f09760c61765cc3e417';

        $access_token_url = 'https://accounts.zoho.com/oauth/v2/token?refresh_token=' . $refresh_token . '&client_id=' . $client_id . '&client_secret=' . $client_secret .'&grant_type=refresh_token';

// Создаём и запускаем функцию для передачи данных и заголовков на сервер, чтобы в ответ получить обновленный токен доступа (access_token).
        function generate_access_token($url){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            $result = curl_exec($ch);
            curl_close($ch);
            return json_decode($result)->access_token;
        }
        $GLOBALS['access_token'] = generate_access_token($access_token_url); //Записываем токен доступа в переменную "$access_token".
//       var_dump($GLOBALS['access_token']); // Проверим есть-ли у нас токен доступа - выводим его на экран

        /**
         * Отправляем в данные в ZOHO CRM на примере ZOHO-модуля "Сделки"
         */
        function insert_records(){
            $access_token = $GLOBALS['access_token']; // Сюда вставляем обновленный токен доступа "access token" (см. код выше).
            $dataform = $GLOBALS['dataform'];

            // Формируем данные из веб-формы для передачи в ZOHO CRM
            $post_data = [
                'data' => [
                    [
                        "Subject" => $dataform['subject'],
                        "Due_Date" => $dataform['due_date'],
                        "Priority" => $dataform['priority'],
                        "Status" => $dataform['status'],
                        '$se_module' => $dataform['se_module'],
                        "What_Id" => [
                                      "id" => $dataform['id'],
                                     ],
                        "Description" => $dataform['description'],
                    ],
                ],
                'trigger' => [
                    "approval",
                    "workflow",
                    "blueprint"
                ]
            ];


            // Делаем передачу данных и заголовков на сервер, чтобы в ответ получить подтверждение успешной передачи данных.
            $token_url = 'https://www.zohoapis.com/crm/v2/Tasks';

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $token_url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode( $post_data ));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array( 'Authorization: Zoho-oauthtoken ' . $access_token,
                'Content-Type: application/x-www-form-urlencoded' ));
            $response = curl_exec($ch);
            $response = json_decode($response);
            return $response;
            echo '<pre>';  print_r($response); //Посмотрим какой статус отправки данных приходит с сервера
        }
        $tasks= insert_records();
        return $tasks;
    }
}
