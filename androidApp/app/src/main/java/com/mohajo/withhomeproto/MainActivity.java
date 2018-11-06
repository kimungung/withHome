package com.mohajo.withhomeproto;

import android.content.ClipData;
import android.content.ClipboardManager;
import android.content.Context;
import android.content.Intent;
import android.os.Build;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Toast;

import com.google.firebase.iid.FirebaseInstanceId;

public class MainActivity extends AppCompatActivity {

    private static final String testTAG = "myTest";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

    }

    //Toast msg 띄우는 용도
    public void showToast(String msg){
        Toast toast0=Toast.makeText(this, msg,Toast.LENGTH_SHORT);
        toast0.show();
    }

    public void onButtonWebClicked(View v) {

        Intent intent0 = new Intent(getApplicationContext(), WebActivity.class);
        startActivity(intent0);

    }

    //됨
    public void onTokenButton(View v){

        ClipboardManager clipboardManager =(ClipboardManager)getSystemService(CLIPBOARD_SERVICE);
        ClipData clipData;

        clipData = ClipData.newPlainText("Label",FirebaseInstanceId.getInstance().getToken()+"");
        clipboardManager.setPrimaryClip(clipData);
        Log.i(testTAG, FirebaseInstanceId.getInstance().getToken());
        showToast("회원 가입에 필요한 토큰이 복사되었습니다.");
    }



    //세팅 창으로 넘어감
    public void onButtonSettingClicked(View v) {

        Intent intent0 = new Intent(getApplicationContext(), SettingActivity.class);
        startActivity(intent0);

    }


   
    public void setClipboardForToken(Context context){
        if(Build.VERSION.SDK_INT< Build.VERSION_CODES.HONEYCOMB){
            android.text.ClipboardManager clipboard =(android.text.ClipboardManager) context.getSystemService(Context.CLIPBOARD_SERVICE);
            clipboard.setText(FirebaseInstanceId.getInstance().getToken());
        }else{
            android.content.ClipboardManager clipboard =(android.content.ClipboardManager) context.getSystemService(Context.CLIPBOARD_SERVICE);
            android.content.ClipData clip=android.content.ClipData.newPlainText("Copied Text",FirebaseInstanceId.getInstance().getToken());
            clipboard.setPrimaryClip(clip);
        }
    }

}
