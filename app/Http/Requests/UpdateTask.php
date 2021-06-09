<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Models\Task;
use Illuminate\Validation\Rule;

class UpdateTask extends CreateTask
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $rule = parent::rules();
        $status_rule = Rule::in(array_keys(Task::STATUS));

            //
            // タイトルと期限はすでにCreateTaskで定義済み

            // $status_rule = Rule
            return $rule + [
                // 変数展開するとどうなるか
                'status' => 'required|'.$status_rule,
            ];
    }
    public function attributes()
    {
        $attributes = parent::attributes();
        return $attributes + [
            'status' => '状態',
        ];
    }

    public function messages()
    {
        // いつ引数$itemいれるのか
        $messages = parent::messages();

        $status_labels = array_map(function($item){
            return $item['label'];
        }, Task::STATUS);

        $status_labels = implode('、', $status_labels);

        return $messages + [
            'status.in' => ':attributeには'.$status_labels.'のいずれかを指定してください',
        ];
    }
}
