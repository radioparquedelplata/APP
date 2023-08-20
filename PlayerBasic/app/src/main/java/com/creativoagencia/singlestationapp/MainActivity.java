package com.creativoagencia.singlestationapp;

import static com.creativoagencia.singlestationapp.service.ExoService.exoPlayer;

import android.app.Dialog;
import android.app.NotificationManager;
import android.content.BroadcastReceiver;
import android.content.Context;
import android.content.Intent;
import android.content.IntentFilter;
import android.content.pm.PackageManager;
import android.graphics.Color;
import android.graphics.LinearGradient;
import android.graphics.Shader;
import android.graphics.drawable.ColorDrawable;
import android.graphics.drawable.PaintDrawable;
import android.graphics.drawable.ShapeDrawable;
import android.graphics.drawable.shapes.RectShape;
import android.media.AudioManager;
import android.net.Uri;
import android.os.Bundle;
import android.os.StrictMode;
import android.provider.Settings;
import android.util.Log;
import android.view.Gravity;
import android.view.KeyEvent;
import android.view.LayoutInflater;
import android.view.View;
import android.view.Window;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.PopupMenu;
import android.widget.PopupWindow;
import android.widget.RelativeLayout;
import android.widget.SeekBar;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.appcompat.app.ActionBar;
import androidx.appcompat.app.AppCompatActivity;

import com.afollestad.materialdialogs.MaterialDialog;
import com.android.volley.Cache;
import com.android.volley.Network;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.toolbox.BasicNetwork;
import com.android.volley.toolbox.DiskBasedCache;
import com.android.volley.toolbox.HurlStack;
import com.android.volley.toolbox.StringRequest;
import com.bumptech.glide.Glide;
import com.google.android.gms.ads.AdError;
import com.google.android.gms.ads.AdRequest;
import com.google.android.gms.ads.AdSize;
import com.google.android.gms.ads.AdView;
import com.google.android.gms.ads.FullScreenContentCallback;
import com.google.android.gms.ads.LoadAdError;
import com.google.android.gms.ads.MobileAds;
import com.google.android.gms.ads.interstitial.InterstitialAd;
import com.google.android.gms.ads.interstitial.InterstitialAdLoadCallback;
import com.creativoagencia.singlestationapp.NotificationService.SharedPrefManager;
import com.creativoagencia.singlestationapp.service.ExoService;
import com.creativoagencia.singlestationapp.service.Notification_Service;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.UnsupportedEncodingException;
import java.net.URLEncoder;

public class MainActivity extends AppCompatActivity implements AudioManager.OnAudioFocusChangeListener {
    int MAX_SLEEP_MODE = 120;
    int MIN_SLEEP_MODE = 5;
    int STEP_SLEEP_MODE = 5;
    public static ImageView Share, iv_playpause, facebook, whatsapp, Youtube, timer, web, AlbumArt,
            Tv, _twitter, _insta,iv_more;
    private SeekBar Vol_seekbar;
    private AudioManager audioManager = null;
    public static RelativeLayout backcolor;
    private EqualizerView equalizer;
    private TextView Tv_Song_Name, Tv_Artist_Name;
    private String url = "", title = "", _facebook = "", _Youtube = "", _whatsapp = "", _web = "", m3u8 = "",
            facebook_id = "", url_instagram = "", url_twitter = "", url_img = "", cover_img = "", admob_native_id = "";
    public static Data_Reciever1 receiver1;
    public static Cross_Receiver reciever_cross;
    String start_color = "#000000";
    String end_color = "#007cf7";
    private AudioManager mAudioManager;
    ImageView background_image;
    //private InterstitialAd mInterstitialAd;
    private InterstitialAd mInterstitialAd;
    PopupWindow pwindo_menu;
    String refreshedToken,android_id;
    public static MainActivity inst;


    @Override
    public void onStart() {
        super.onStart();
        inst = this;
    }
//www.creativoagencia.pe

    private void CallAPi2(String id) {
        StrictMode.ThreadPolicy policy = new StrictMode.ThreadPolicy.Builder().permitAll().build();
        StrictMode.setThreadPolicy(policy);
        RequestQueue requestQueue;
        Cache cache = new DiskBasedCache(getCacheDir(), 1024 * 1024); // 1MB cap
        Network network = new BasicNetwork(new HurlStack());
        requestQueue = new RequestQueue(cache, network);
        requestQueue.start();

        StringRequest strReq = new StringRequest(Constant.Noti_Url+"&device_id=" + android_id+"&device_token="+refreshedToken+"&appid="+id, response -> {
            Log.d("ghgrrrrrr", response);
            JSONObject jsonObject = null;
            try {
                jsonObject = new JSONObject(response);
                String sucess = jsonObject.getString("status");

            } catch (JSONException e) {
                e.printStackTrace();
            }
        }, error -> {
        });
        requestQueue.add(strReq);
    }

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        Share = findViewById(R.id.share);
        //iv_favourite = findViewById(R.id.iv_favourite);
        facebook = findViewById(R.id.facebook);
        Youtube = findViewById(R.id.youtube);
        whatsapp = findViewById(R.id.whatsapp);
        web = findViewById(R.id.web);
        iv_playpause = findViewById(R.id.iv_playpause);
        Vol_seekbar = findViewById(R.id.seekBar);
        backcolor = findViewById(R.id.backcolor);
        equalizer = findViewById(R.id.equalizer);
        Tv_Song_Name = findViewById(R.id.song_name);
        Tv_Artist_Name = findViewById(R.id.artist_name);
        _twitter = findViewById(R.id.twitter);
        _insta = findViewById(R.id.insta);
        Tv_Artist_Name.setSelected(true);
        Tv_Song_Name.setSelected(true);
        AlbumArt = findViewById(R.id.albumart);
        Tv = findViewById(R.id.tv);
        Share = findViewById(R.id.share);
        timer = findViewById(R.id.timer);
        background_image = findViewById(R.id.background_image);
        iv_more = findViewById(R.id.iv_more);
        //disableSSLCertificateVerify();

        refreshedToken = SharedPrefManager.getInstance(this).getDeviceToken();
        android_id = Settings.Secure.getString(getContentResolver(), Settings.Secure.ANDROID_ID);


        iv_playpause.setOnClickListener(view -> play());
        Share.setOnClickListener(view -> _Share());

        start_color = getSharedPreferences("skin", MODE_PRIVATE).getString("start_color", "");
        end_color = getSharedPreferences("skin", MODE_PRIVATE).getString("end_color", "");
        url = getSharedPreferences("skin", MODE_PRIVATE).getString("radio_stream", "");
        m3u8 = getSharedPreferences("skin", MODE_PRIVATE).getString("tv_stream", "");
        _facebook = getSharedPreferences("skin", MODE_PRIVATE).getString("facebook", "");
        facebook_id = getSharedPreferences("skin", MODE_PRIVATE).getString("facebook_id", "");
        _web = getSharedPreferences("skin", MODE_PRIVATE).getString("website", "");
        _whatsapp = getSharedPreferences("skin", MODE_PRIVATE).getString("whatsapp", "");
        _Youtube = getSharedPreferences("skin", MODE_PRIVATE).getString("youtube", "");
        url_instagram = getSharedPreferences("skin", MODE_PRIVATE).getString("url_instagram", "");
        url_twitter = getSharedPreferences("skin", MODE_PRIVATE).getString("url_twitter", "");
        url_img = getSharedPreferences("skin", MODE_PRIVATE).getString("background_image", "");
        cover_img = getSharedPreferences("skin", MODE_PRIVATE).getString("cover_image", "");
        Constant.admob_id = getSharedPreferences("skin", MODE_PRIVATE).getString("admob_id", "");
        String admob_banner_id = getSharedPreferences("skin", MODE_PRIVATE).getString("admob_banner_id", "");
        String admob_interstitial_id = getSharedPreferences("skin", MODE_PRIVATE).getString("admob_interstitial_id", "");
        admob_native_id = getSharedPreferences("skin", MODE_PRIVATE).getString("admob_native_id", "");
        String about_us = getSharedPreferences("skin", MODE_PRIVATE).getString("about_us", "");
        String our_service = getSharedPreferences("skin", MODE_PRIVATE).getString("our_service", "");
        String privacy_policy = getSharedPreferences("skin", MODE_PRIVATE).getString("privacy_policy", "");
        String id = getSharedPreferences("skin", MODE_PRIVATE).getString("id", "");

        CallAPi2(id);

        if (url_img!=null) {
            Glide.with(getApplicationContext()).load(url_img).placeholder(R.drawable.splash).into(background_image);
        }

        if (cover_img!=null) {
            Glide.with(getApplicationContext()).load(cover_img).placeholder(R.drawable.app_icon).into(AlbumArt);
        }
        //google ads
        MobileAds.initialize(this, initializationStatus -> {});
        if (admob_banner_id != null) {
            View adContainer = findViewById(R.id.adView);
            AdView mAdView = new AdView(this);
            mAdView.setAdSize(AdSize.BANNER);
            mAdView.setAdUnitId(admob_banner_id);
            ((RelativeLayout) adContainer).addView(mAdView);
            AdRequest adRequestw = new AdRequest.Builder().build();
            mAdView.loadAd(adRequestw);
        }

        MobileAds.initialize(this, initializationStatus -> {});

        if (admob_interstitial_id!=null) {
            loadAd(admob_interstitial_id);
        }


        if (_web.equalsIgnoreCase("")) {
            web.setVisibility(View.GONE);
        } else {
            web.setVisibility(View.VISIBLE);
        }

        if (m3u8.equalsIgnoreCase("")) {
            Tv.setVisibility(View.GONE);
        } else {
            Tv.setVisibility(View.VISIBLE);
        }

        if (_whatsapp.equalsIgnoreCase("")) {
            whatsapp.setVisibility(View.GONE);
        } else {
            whatsapp.setVisibility(View.VISIBLE);
        }

        if (_facebook.equalsIgnoreCase("")) {
            facebook.setVisibility(View.GONE);
        } else {
            facebook.setVisibility(View.VISIBLE);
        }

        if (url_instagram.equalsIgnoreCase("")) {
            _insta.setVisibility(View.GONE);
        } else {
            _insta.setVisibility(View.VISIBLE);
        }

        if (_Youtube.equalsIgnoreCase("")) {
            Youtube.setVisibility(View.GONE);
        } else {
            Youtube.setVisibility(View.VISIBLE);
        }

        if (url_twitter.equalsIgnoreCase("")) {
            _twitter.setVisibility(View.GONE);
        } else {
            _twitter.setVisibility(View.VISIBLE);
        }

        if (start_color.equalsIgnoreCase("")){

        }else if (end_color.equalsIgnoreCase("")){

        }else {
            ShapeDrawable.ShaderFactory shaderFactory = new ShapeDrawable.ShaderFactory() {
                @Override
                public Shader resize(int width, int height) {
                    LinearGradient linearGradient = new LinearGradient(0, 0, width, height,
                            new int[]{
                                    Color.parseColor(start_color),
                                    Color.parseColor(end_color)
                            },
                            new float[]{0, 1},
                            Shader.TileMode.REPEAT);
                    return linearGradient;
                }
            };
            PaintDrawable paint = new PaintDrawable();
            paint.setShape(new RectShape());
            paint.setShaderFactory(shaderFactory);
            backcolor.setBackground(paint);
        }

        SetList();
        //calldetect();

        audioManager = (AudioManager) getSystemService(Context.AUDIO_SERVICE);
        Vol_seekbar.setMax(audioManager.getStreamMaxVolume(AudioManager.STREAM_MUSIC));
        Vol_seekbar.setProgress(audioManager.getStreamVolume(AudioManager.STREAM_MUSIC));

        mAudioManager = (AudioManager) getSystemService(Context.AUDIO_SERVICE);
        mAudioManager.requestAudioFocus(this, AudioManager.STREAM_MUSIC, AudioManager.AUDIOFOCUS_GAIN);

        receiver1 = new Data_Reciever1();
        registerReceiver(receiver1, new IntentFilter(Constant.RECIEVER_NOTI_PLAYPAUSE1));

        reciever_cross = new Cross_Receiver();
        registerReceiver(reciever_cross, new IntentFilter(Constant.RECEIVER_NOTI_CROSS));

        Vol_seekbar.setOnSeekBarChangeListener(new SeekBar.OnSeekBarChangeListener() {
            @Override
            public void onProgressChanged(SeekBar seekBar, int i, boolean b) {
                audioManager.setStreamVolume(AudioManager.STREAM_MUSIC, i, 0);
            }

            @Override
            public void onStartTrackingTouch(SeekBar seekBar) {
            }

            @Override
            public void onStopTrackingTouch(SeekBar seekBar) {
            }
        });

        iv_more.setOnClickListener(view -> {
            PopupMenu popup = new PopupMenu(MainActivity.this, iv_more);
            popup.inflate(R.menu.menumauin);
            popup.setOnMenuItemClickListener(item -> {
                switch (item.getItemId()) {

                    case R.id.about:
                        PopUp("Nosotros",about_us);
                        break;

                    case R.id.service:
                        PopUp("Servicios",our_service);
                        break;

                    case R.id.privacy:
                        Intent privacy_ = new Intent(Intent.ACTION_VIEW);
                        privacy_.setData(Uri.parse(privacy_policy));
                        startActivity(privacy_);
                        break;
                }
                return false;
            });
            popup.show();
        });

        timer.setOnClickListener(view -> showDialogSleepMode());

        Tv.setOnClickListener(view -> {
            if (exoPlayer != null) {
                //Toast.makeText(context, "Please stop recording first to play another station.", Toast.LENGTH_LONG).show();
                iv_playpause.setImageResource(R.drawable.ic_play_button);

                Constant.IS_PLAYING = false;
                ExoService.getInstance().pause();
                clearNotification();

                Intent intent = new Intent(MainActivity.this, TvActivity.class);
                intent.putExtra("m3u8", m3u8);
                startActivity(intent);

            } else {
                Intent intent = new Intent(MainActivity.this, TvActivity.class);
                intent.putExtra("m3u8", m3u8);
                startActivity(intent);
            }
        });

        facebook.setOnClickListener(view -> {

            String facebookId = "https://www.facebook.com/" + facebook_id;

            try {
                startActivity(new Intent(Intent.ACTION_VIEW, Uri.parse(facebookId)));
            } catch (Exception e) {
                startActivity(new Intent(Intent.ACTION_VIEW, Uri.parse(_facebook)));
            }

        });

        Youtube.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent facebookIntent = new Intent(Intent.ACTION_VIEW);
                //String facebookUrl = getFacebookPageURL(getApplicationContext(), _facebook,"");
                facebookIntent.setData(Uri.parse(_Youtube));
                startActivity(facebookIntent);
            }
        });

        web.setOnClickListener(view -> {
            Intent facebookIntent = new Intent(Intent.ACTION_VIEW);
            //String facebookUrl = getFacebookPageURL(getApplicationContext(), _facebook,"");
            facebookIntent.setData(Uri.parse(_web));
            startActivity(facebookIntent);
        });

        whatsapp.setOnClickListener(view -> {
                Intent i = new Intent(Intent.ACTION_VIEW);
                i.setData(Uri.parse("https://wa.me/" + _whatsapp));
                startActivity(i);

        });

        _insta.setOnClickListener(view -> {
            Intent intentWhatsapp = new Intent(Intent.ACTION_VIEW);
            intentWhatsapp.setData(Uri.parse(url_instagram));
            startActivity(intentWhatsapp);
        });

        _twitter.setOnClickListener(view -> {
            boolean isWhatsappInstalled = whatsappInstalledOrNot("com.twitter.android");
            if (isWhatsappInstalled) {
                Intent intentWhatsapp = new Intent(Intent.ACTION_VIEW);
                intentWhatsapp.setData(Uri.parse(url_twitter));
                intentWhatsapp.setPackage("com.twitter.android");
                startActivity(intentWhatsapp);
            } else {
                Intent intentWhatsapp = new Intent(Intent.ACTION_VIEW);
                intentWhatsapp.setData(Uri.parse(url_twitter));
                startActivity(intentWhatsapp);
            }
        });

    }

    public void loadAd(String admob_interstitial_id) {
        AdRequest adRequest = new AdRequest.Builder().build();
        InterstitialAd.load(
                this,
                admob_interstitial_id,
                adRequest,
                new InterstitialAdLoadCallback() {
                    @Override
                    public void onAdLoaded(@NonNull InterstitialAd interstitialAd) {
                        // The mInterstitialAd reference will be null until
                        // an ad is loaded.
                        mInterstitialAd = interstitialAd;
                        Log.i("TAG", "onAdLoaded");
                        mInterstitialAd.setFullScreenContentCallback(
                                new FullScreenContentCallback() {
                                    @Override
                                    public void onAdDismissedFullScreenContent() {
                                        // Called when fullscreen content is dismissed.
                                        // Make sure to set your reference to null so you don't
                                        // show it a second time.
                                        mInterstitialAd = null;
                                        onDestroy();
                                        Log.d("TAG", "The ad was dismissed.");
                                    }

                                    @Override
                                    public void onAdFailedToShowFullScreenContent(AdError adError) {
                                        // Called when fullscreen content failed to show.
                                        // Make sure to set your reference to null so you don't
                                        // show it a second time.
                                        mInterstitialAd = null;
                                        Log.d("TAG", "The ad failed to show.");
                                    }

                                    @Override
                                    public void onAdShowedFullScreenContent() {
                                        // Called when fullscreen content is shown.
                                        Log.d("TAG", "The ad was shown.");
                                    }
                                });
                    }

                    @Override
                    public void onAdFailedToLoad(@NonNull LoadAdError loadAdError) {
                        // Handle the error
                        Log.i("TAG", loadAdError.getMessage());
                        mInterstitialAd = null;
                    }
                });
    }

    private void PopUp(String name,String text) {
        try {
            LayoutInflater inflater = (LayoutInflater) MainActivity.this
                    .getSystemService(Context.LAYOUT_INFLATER_SERVICE);
            View layout = inflater.inflate(R.layout.popup_,findViewById(R.id.popup1));

            final TextView Name = layout.findViewById(R.id.title);
            final TextView textView = layout.findViewById(R.id.txtv_no_);

            Name.setText(name);
            textView.setText(text);

            ImageView btn_close = layout.findViewById(R.id.cancel);
            btn_close.setOnClickListener(v -> pwindo_menu.dismiss());

            pwindo_menu = new PopupWindow(layout, ActionBar.LayoutParams.MATCH_PARENT, ActionBar.LayoutParams.MATCH_PARENT, true);
            pwindo_menu.setBackgroundDrawable(new ColorDrawable(Color.TRANSPARENT));////custom dialog Box
            pwindo_menu.showAtLocation(layout, Gravity.CENTER, 0, 0);

        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    /*private void refreshAd() {

        AdLoader adLoader = new AdLoader.Builder(this, admob_native_id)
                .forUnifiedNativeAd(unifiedNativeAd -> {
                    NativeTemplateStyle styles = new NativeTemplateStyle.Builder().build();
                    TemplateView template = findViewById(R.id.medium_template);
                    template.setStyles(styles);
                    template.setNativeAd(unifiedNativeAd);
                }).build();
        adLoader.loadAd(new AdRequest.Builder().build());
    }*/

    @Override
    public void onAudioFocusChange(int focusChange) {
        if (focusChange <= 0) {
            //LOSS -> PAUSE
            if (exoPlayer != null) {
                ExoService.getInstance().pause();
                Intent kkk = new Intent(MainActivity.this, ExoService.class);
                kkk.setAction(Constant.ACTION_PAUSE_STICKING);
                startService(kkk);
                //iv_playpause_small.setImageResource(R.drawable.ic_play_button);
                iv_playpause.setImageResource(R.drawable.ic_play_button);

                Intent startIntent1 = new Intent(MainActivity.this, Notification_Service.class);
                startIntent1.setAction(Constant.ACTION_PLAY_STICKING);
                startService(startIntent1);

                Constant.IS_PLAYING = false;
            }

        } else {
            //GAIN -> PLAY
            if (exoPlayer != null) {

                //iv_playpause_small.setImageResource(R.drawable.ic_pause_button);
                iv_playpause.setImageResource(R.drawable.ic_pause_button);
                equalizer.animateBars();

                Intent kkk = new Intent(MainActivity.this, ExoService.class);
                kkk.setAction(Constant.ACTION_PLAY_STICKING);
                startService(kkk);

                Intent startIntent1 = new Intent(MainActivity.this, Notification_Service.class);
                startIntent1.setAction(Constant.ACTION_PLAY_STICKING);
                startService(startIntent1);

                Constant.IS_PLAYING = true;
            }
        }
    }

//    public void calldetect() {
//        TelephonyManager telephonyManager = (TelephonyManager) getSystemService(Context.TELEPHONY_SERVICE);
//        PhoneStateListener callStateListener = new PhoneStateListener() {
//            public void onCallStateChanged(int state, String incomingNumber) {
//                if (state == TelephonyManager.CALL_STATE_RINGING) {
//                    if (exoPlayer != null) {
//                        exoPlayer.stop();
//                    }
//                }
//                if (state == TelephonyManager.CALL_STATE_OFFHOOK) {
//                    if (exoPlayer != null) {
//                        exoPlayer.stop();
//                    }
//                }
//                if (state == TelephonyManager.CALL_STATE_IDLE) {
//                    if (exoPlayer != null) {
//                        Constant.IS_PLAYING = true;
//
//                        Intent kkk = new Intent(getApplicationContext(), ExoService.class);
//                        kkk.setAction(Constant.ACTION_PLAY_STICKING);
//                        startService(kkk);
//
//                        Intent k = new Intent(getApplicationContext(), Notification_Service.class);
//                        k.setAction(Constant.ACTION_PLAY_STICKING);
//                        startService(k);
//                    }
//                }
//            }
//        };
//
//        telephonyManager.listen(callStateListener, PhoneStateListener.LISTEN_CALL_STATE);
//    }

    public void showDialogSleepMode() {
        try {
            View mView = LayoutInflater.from(this).inflate(R.layout.dialog_sleep_time, null);
            final TextView mTvInfo = mView.findViewById(R.id.tv_info);
            if (RadioSettingManager.getSleepMode(this) > 0) {
                mTvInfo.setText(String.format(getString(R.string.format_minutes), String.valueOf(RadioSettingManager.getSleepMode(this))));
            } else {
                mTvInfo.setText(R.string.title_off);
            }

            SeekArc mCircularVir = mView.findViewById(R.id.seek_sleep);
            mCircularVir.setProgressColor(getResources().getColor(R.color.colorAccent));
            mCircularVir.setArcColor(getResources().getColor(R.color.progress_gray));
            mCircularVir.setMax((MAX_SLEEP_MODE - MIN_SLEEP_MODE) / STEP_SLEEP_MODE + 1);
            mCircularVir.setProgressWidth(getResources().getDimensionPixelOffset(R.dimen.tiny_margin));
            mCircularVir.setProgress(RadioSettingManager.getSleepMode(this) / STEP_SLEEP_MODE);
            mCircularVir.setOnSeekArcChangeListener(new SeekArc.OnSeekArcChangeListener() {
                @Override
                public void onProgressChanged(SeekArc seekArc, int progress, boolean fromUser) {
                    try {
                        RadioSettingManager.setSleepMode(MainActivity.this, progress * STEP_SLEEP_MODE);
                        if (progress == 0) {
                            mTvInfo.setText(R.string.title_off);
                        } else {
                            mTvInfo.setText(String.format(getString(R.string.format_minutes), String.valueOf(RadioSettingManager.getSleepMode(MainActivity.this))));
                        }

                        Intent mIntent1 = new Intent(MainActivity.this, ExoService.class);
                        mIntent1.setAction(Constant.ACTION_UPDATE_SLEEP_MODE);
                        startService(mIntent1);

                    } catch (Exception e) {
                        e.printStackTrace();
                    }
                }

                @Override
                public void onStartTrackingTouch(SeekArc seekArc) {
                }

                @Override
                public void onStopTrackingTouch(SeekArc seekArc) {
                }
            });

            MaterialDialog.Builder mBuilder = createBasicDialogBuilder(R.string.title_sleep_mode, R.string.title_done, 0);
            mBuilder.customView(mView, false);
            mBuilder.onPositive((dialog, which) -> {
            });
            final MaterialDialog mDialog = mBuilder.build();
            mDialog.show();
        } catch (Exception e) {
            e.printStackTrace();
        }

    }


    public MaterialDialog.Builder createBasicDialogBuilder(int titleId, int resPositive, int resNegative) {
        MaterialDialog.Builder mBuilder = new MaterialDialog.Builder(this);
        mBuilder.backgroundColor(getResources().getColor(R.color.colorPrimary));
        mBuilder.title(titleId);
        mBuilder.titleColor(getResources().getColor(R.color.colorAccent));
        mBuilder.contentColor(getResources().getColor(R.color.colorAccent));
        mBuilder.positiveColor(getResources().getColor(R.color.colorAccent));
        if (resPositive != 0) {
            mBuilder.positiveText(resPositive);
        }
        if (resNegative != 0) {
            mBuilder.negativeText(resNegative);
        }
        mBuilder.negativeColor(getResources().getColor(R.color.colorAccent));
        mBuilder.autoDismiss(true);
        return mBuilder;
    }

    private boolean appInstalledOrNot(String uri) {
        PackageManager pm = getPackageManager();
        boolean app_installed = false;
        try {
            pm.getPackageInfo(uri, PackageManager.GET_ACTIVITIES);
            app_installed = true;
        } catch (PackageManager.NameNotFoundException e) {
            app_installed = false;
        }
        return app_installed;
    }

    private void _Share() {
        String link = "https://play.google.com/store/apps/details?id=" + getPackageName();
        String text1 = getString(R.string.listin) + Constant.ALBUM_NAME + getString(R.string.on) + getResources().getString(R.string.app_name);
        String text2 = getString(R.string.you_to);

        Intent intent2 = new Intent(Intent.ACTION_SEND);
        intent2.setType("text/plain");
        intent2.putExtra(Intent.EXTRA_TEXT, text1 + text2 + link);
        intent2.addFlags(Intent.FLAG_GRANT_READ_URI_PERMISSION);
        startActivity(Intent.createChooser(intent2, "Share via"));

    }

    private void play() {
        if (Constant.IS_PLAYING) {
            iv_playpause.setImageResource(R.drawable.ic_play_button);

            Constant.IS_PLAYING = false;
            ExoService.getInstance().pause();

            Intent kk = new Intent(getApplicationContext(), Notification_Service.class);
            kk.setAction(Constant.ACTION_PLAY_STICKING);
            startService(kk);
            equalizer.stopBars();

        } else {
            iv_playpause.setImageResource(R.drawable.ic_pause_button);
            equalizer.animateBars();
            Constant.IS_PLAYING = true;
            // Intent kkk = new Intent(getApplicationContext(), ExoService.class);
            // kkk.setAction(Constant.ACTION_PLAY_STICKING);
            // startService(kkk);

            // Intent kk = new Intent(getApplicationContext(), Notification_Service.class);
            // kk.setAction(Constant.ACTION_PLAY_STICKING);
            // startService(kk);
            SetList();
        }
    }

    public void SetList() {

        ExoService.initialize(getApplicationContext(), url);
        Constant.IS_PLAYING = true;
        Intent kkk = new Intent(getApplicationContext(), ExoService.class);
        kkk.setAction(Constant.ACTION_PLAY_STICKING);
        startService(kkk);

        Intent kk = new Intent(getApplicationContext(), Notification_Service.class);
        kk.setAction(Constant.ACTION_PLAY_STICKING);
        startService(kk);

        SetMetaData(url);

        equalizer.animateBars(); // To start the animation

        //CallApi(list.get(position).getTid());
        //Glide.with(this).load(Constant.IMAGE_URL).placeholder(R.drawable.app_icon).into(AlbumArt);

        iv_playpause.setImageResource(R.drawable.ic_pause_button);

    }

    private void SetMetaData(String url) {
        Uri uri = Uri.parse(url);
//
//        OnNewMetadataListener listener = new OnNewMetadataListener() {
//                        @Override
//                        public void onNewHeaders(String stringUri, List<String> name, List<String> desc,
//                                                 List<String> br, List<String> genre, List<String> info) {
//                            Constant.ARTIST_NAME = "";
//                            Constant.ALBUM_NAME = "";
//
//                        }
//
//                        @Override
//                        public void onNewStreamTitle(String stringUri, String streamTitle) {
//
//                            Log.d("title2", streamTitle);
//                            if (streamTitle.contains("http")) {
//                                String title = streamTitle.replaceAll("http?://\\S+\\s?", "");
//
//                                Log.d("title", title);
//                                if (title.contains("StreamUrl=")) {
//
//                                    title = title.replace("StreamUrl=", "");
//                                    Log.d("title1", title);
//                                }
//                            } else if (streamTitle.contains("StreamUrl=")) {
//                                title = streamTitle.replace("StreamUrl=", "");
//                            }else if (streamTitle.contains("StreamNext")) {
//                                title = streamTitle.replace("StreamNext", "");
//                                title = title.substring(0, title.indexOf('='));
//                            } else {
//                                title = streamTitle;
//                            }
//
//                            if (Constant.IS_PLAYING) {
//
//                                Intent startIntent1 = new Intent(MainActivity.this, Notification_Service.class);
//                                startIntent1.setAction(Constant.ACTION_PLAY_STICKING);
//                                startService(startIntent1);
//
//                    if (title.contains("-")) {
//                        if (title.contains("'")) {
//                            title= title.replaceAll("'", "\'");
//                        }
//                        String artist_name = title.substring(0, title.indexOf('-'));
//                        String album_name = title.substring(title.indexOf('-') + 1);
//                        Constant.ARTIST_NAME = artist_name;
//                        Constant.ALBUM_NAME = album_name;
//
//                        Tv_Artist_Name.setText(artist_name + " - " + album_name);
//
//                        try {
//                            AlbumArtParsing(artist_name, album_name);
//                        } catch (UnsupportedEncodingException e) {
//                            e.printStackTrace();
//                        }
//
//                    } else {
//                        //Tv_Song_Name.setText("");
//                        Tv_Artist_Name.setText("");
//
//                        Constant.ARTIST_NAME = "";
//                        Constant.ALBUM_NAME = "";
//                    }
//                } else {
//                    Intent startIntent1 = new Intent(MainActivity.this, Notification_Service.class);
//                    startIntent1.setAction(Constant.ACTION_PLAY_STICKING);
//                    startService(startIntent1);
//                }
//            }
//        };
//
//        AudiostreamMetadataManager.getInstance().setUri(uri)
//                .setOnNewMetadataListener(listener).setUserAgent(Util.getUserAgent(this, getResources().getString(R.string.app_name))).start();
//
    }

    public void AlbumArtParsing(String artistName, String albumName) {

        Tv_Artist_Name.setText(artistName + " - " + albumName);

        String a = artistName.trim();
        String b = albumName.trim();
        try {
            artistName = URLEncoder.encode(a, "UTF-8");
            albumName = URLEncoder.encode(b, "UTF-8");

        } catch (UnsupportedEncodingException e) {
            throw new RuntimeException(e);
        }

        String apiUrl = "https://itunes.apple.com/search?media=music&limit=1&term=" + artistName + "-" + albumName;

        System.out.println("---apiUrl----" + apiUrl);
        Log.d("apiUrl", apiUrl);

        RequestQueue requestQueue;
        Cache cache = new DiskBasedCache(getCacheDir(), 1024 * 1024); // 1MB cap
        Network network = new BasicNetwork(new HurlStack());
        requestQueue = new RequestQueue(cache, network);
        requestQueue.start();

        StringRequest strReq = new StringRequest(apiUrl, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                System.out.println("----response album art 111----" + response);
                try {
                    // do code for album not found
                    JSONObject jobj = new JSONObject(response);
                    String resultCount = jobj.getString("resultCount");
                    if (resultCount.equalsIgnoreCase("1")) {
                        JSONArray jsonArray = jobj.getJSONArray("results");
                        JSONObject jsonObject1 = jsonArray.getJSONObject(0);
                        String artworkUrl30 = jsonObject1.getString("artworkUrl30");

                        Log.e("RESULT artworkUrl30", "" + artworkUrl30);
                        String arr_images = artworkUrl30.replace("30x30", "350x350");
                        Log.e("RESULT artworkUrl30", "" + arr_images);

                        if (arr_images.equalsIgnoreCase("")) {
                            Glide.with(MainActivity.this).load(cover_img).placeholder(R.drawable.app_icon).into(AlbumArt);
                        } else {
                            System.out.println("----arr_images inside---" + arr_images);

                            if (arr_images.isEmpty()) {
                                // code for album not found
                                try {
                                    Glide.with(MainActivity.this)
                                            .load(cover_img)
                                            .placeholder(R.drawable.app_icon).into(AlbumArt);

                                } catch (OutOfMemoryError e) {
                                    System.out.println(e);
                                }
                            } else {
                                Constant.IMAGE_URL = arr_images;
                                System.out.println("---album_image----" + arr_images);
                                if (arr_images == null) {
                                    try {
                                        Glide.with(MainActivity.this).load(cover_img).placeholder(R.drawable.app_icon).into(AlbumArt);
                                    } catch (OutOfMemoryError e) {
                                        System.out.println(e);
                                    }
                                } else {
                                    try {
                                        Glide.with(MainActivity.this).load(arr_images).placeholder(R.drawable.app_icon).into(AlbumArt);

                                        Intent startIntent1 = new Intent(MainActivity.this, Notification_Service.class);
                                        startIntent1.setAction(Constant.ACTION_PLAY_STICKING);
                                        startService(startIntent1);

                                    } catch (OutOfMemoryError e) {
                                        System.out.println(e);
                                    }
                                }
                            }
                        }
                    }else {
                        Glide.with(MainActivity.this).load(cover_img).placeholder(R.drawable.app_icon).into(AlbumArt);

                    }
                } catch (JSONException e) {
                    e.printStackTrace();
                    Glide.with(MainActivity.this).load(cover_img).placeholder(R.drawable.app_icon).into(AlbumArt);
                }
            }
        }, error -> {
        });
        requestQueue.add(strReq);
    }

    private class Data_Reciever1 extends BroadcastReceiver {
        @Override
        public void onReceive(Context context, Intent intent) {
            play();
        }
    }

    @Override
    protected void onDestroy() {
        super.onDestroy();

        Intent ddd = new Intent(getApplicationContext(), ExoService.class);
        ddd.setAction(Constant.ACTION_PAUSE_STICKING);
        stopService(ddd);

        Intent dddd = new Intent(getApplicationContext(), Notification_Service.class);
        dddd.setAction(Constant.ACTION_PAUSE_STICKING);
        startService(dddd);

        unregisterReceiver(receiver1);
        unregisterReceiver(reciever_cross);
        //resetTimer();
        clearNotification();

        android.os.Process.killProcess(android.os.Process.myPid());

    }

    public class Cross_Receiver extends BroadcastReceiver {

        @Override
        public void onReceive(Context context, Intent intent) {
            System.out.println("----cross Event-----");

            Intent ddd = new Intent(getApplicationContext(), ExoService.class);
            ddd.setAction(Constant.ACTION_PAUSE_STICKING);
            stopService(ddd);

            Intent dddd = new Intent(getApplicationContext(), Notification_Service.class);
            dddd.setAction(Constant.ACTION_PAUSE_STICKING);
            stopService(dddd);

            unregisterReceiver(receiver1);
            unregisterReceiver(reciever_cross);

            clearNotification();
            android.os.Process.killProcess(android.os.Process.myPid());
            System.exit(1);
        }
    }
    //www.creativoagencia.pe
    @Override
    public void onBackPressed() {
        Showdialoge();
    }

    public void Showdialoge() {
        final Dialog dialog = new Dialog(this);
        dialog.requestWindowFeature(Window.FEATURE_NO_TITLE);
        dialog.setCanceledOnTouchOutside(false);
        dialog.setContentView(R.layout.dialog);
        RelativeLayout background = dialog.findViewById(R.id.background);
        Button tv_yes = dialog.findViewById(R.id.tv_yes);
        Button tv_no = dialog.findViewById(R.id.tv_no);
        Button minimize = dialog.findViewById(R.id.minimize);

        if (start_color.equalsIgnoreCase("")){
            start_color = "#000000";
        }else if (end_color.equalsIgnoreCase("")){
            end_color = "#007cf7";
        }

        ShapeDrawable.ShaderFactory shaderFactory = new ShapeDrawable.ShaderFactory() {
            @Override
            public Shader resize(int width, int height) {
                final LinearGradient linearGradient = new LinearGradient(0, 0, width, height,
                        new int[]{
                                Color.parseColor(start_color),
                                Color.parseColor(end_color)
                        },
                        new float[]{0, 1},
                        Shader.TileMode.REPEAT);
                return linearGradient;
            }
        };
        PaintDrawable paint = new PaintDrawable();
        paint.setShape(new RectShape());
        paint.setShaderFactory(shaderFactory);
        background.setBackground(paint);


        dialog.show();

        tv_yes.setOnClickListener(v -> {

            if (mInterstitialAd !=null) {
                mInterstitialAd.show(MainActivity.this);
            } else {
                onDestroy();
               //  Showdialoge();
                Log.d("TAG", "The interstitial wasn't loaded yet.");
            }

            dialog.dismiss();
        });

        minimize.setOnClickListener(view -> {
            dialog.dismiss();
            Intent homeIntent = new Intent(Intent.ACTION_MAIN);
            homeIntent.addCategory(Intent.CATEGORY_HOME);
            startActivity(homeIntent);
        });

        tv_no.setOnClickListener(v -> dialog.dismiss());

    }

    public void clearNotification() {
        NotificationManager notificationManager = (NotificationManager) getSystemService(Context.NOTIFICATION_SERVICE);
        notificationManager.cancel(1);
    }

    private boolean whatsappInstalledOrNot(String uri) {
        PackageManager pm = getPackageManager();
        boolean app_installed = false;
        try {
            pm.getPackageInfo(uri, PackageManager.GET_ACTIVITIES);
            app_installed = true;
        } catch (PackageManager.NameNotFoundException e) {
            app_installed = false;
        }
        return app_installed;
    }

    @Override
    public boolean onKeyDown(int keyCode, KeyEvent event) {
        if (keyCode == KeyEvent.KEYCODE_VOLUME_UP) {
            int index = Vol_seekbar.getProgress();
            Vol_seekbar.setProgress(index + 1);

            if (Vol_seekbar.getProgress() > 0) {
                //Mute.setImageResource(R.drawable.highvolume_icon);
            }
            return true;
        } else if (keyCode == KeyEvent.KEYCODE_VOLUME_DOWN) {
            int index = Vol_seekbar.getProgress();
            Vol_seekbar.setProgress(index - 1);

            if (Vol_seekbar.getProgress() == 0) {
                //Mute.setImageResource(R.drawable.mute_icon);
            }
            return true;
        }
        return super.onKeyDown(keyCode, event);
    }

    @Override
    public boolean onKeyUp(int keyCode, KeyEvent event) {
        return super.onKeyUp(keyCode, event);
    }

    //www.creativoagencia.pe
}