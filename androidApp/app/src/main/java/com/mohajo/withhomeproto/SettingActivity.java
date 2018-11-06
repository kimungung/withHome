package com.mohajo.withhomeproto;


import android.content.Intent;
import android.os.Vibrator;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.Switch;
import android.view.View;
import android.widget.Toast;

public class SettingActivity extends AppCompatActivity {

    //switch toggle은 자동임'')~~
    Switch vibrationSwitch;
    Switch pushSwitch;
    Switch testSound1;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_setting);

        vibrationSwitch=(Switch)findViewById(R.id.VibrateAlarm);
        pushSwitch=(Switch)findViewById(R.id.PushAlarm);

        
        //testSound1=(Switch)findViewById(R.id.TSound1);

    }

    //메인 activity 넘어가는 용도 (기록용)
    public void onBackClicked(View v) {

        Intent intent0 = new Intent(getApplicationContext(), MainActivity.class);

        startActivity(intent0);

    }



    public void showToast(String msg){
        Toast toast0=Toast.makeText(this, msg,Toast.LENGTH_SHORT);
        toast0.show();
    }

    //버튼 테스트용
    public void onTestButtonClicked(View v) {

        if(vibrationSwitch.isChecked()) {
            Vibrator vib0 = (Vibrator) getSystemService(VIBRATOR_SERVICE);
            vib0.vibrate(new long[]{500, 500, 1000}, -1);

            //showToast("진동 테스트");
        }
    }



}
