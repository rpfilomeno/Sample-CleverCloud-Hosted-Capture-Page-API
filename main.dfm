object Form1: TForm1
  Left = 684
  Top = 210
  BorderStyle = bsDialog
  Caption = 'DEMO APP'
  ClientHeight = 393
  ClientWidth = 567
  Color = clBtnFace
  Font.Charset = DEFAULT_CHARSET
  Font.Color = clWindowText
  Font.Height = -11
  Font.Name = 'MS Sans Serif'
  Font.Style = []
  OldCreateOrder = False
  PixelsPerInch = 96
  TextHeight = 13
  object Label2: TLabel
    Left = 64
    Top = 16
    Width = 38
    Height = 13
    Caption = 'txnType'
  end
  object Label1: TLabel
    Left = 40
    Top = 56
    Width = 64
    Height = 13
    Caption = 'txnReference'
  end
  object Label3: TLabel
    Left = 56
    Top = 88
    Width = 50
    Height = 13
    Caption = 'txnAmount'
  end
  object Label4: TLabel
    Left = 48
    Top = 120
    Width = 56
    Height = 13
    Caption = 'txnCurrency'
  end
  object Label5: TLabel
    Left = 48
    Top = 152
    Width = 55
    Height = 13
    Caption = 'merchantID'
  end
  object Label9: TLabel
    Left = 56
    Top = 216
    Width = 48
    Height = 13
    Caption = 'shortCode'
  end
  object Label7: TLabel
    Left = 48
    Top = 248
    Width = 54
    Height = 13
    Caption = 'customerID'
  end
  object Label8: TLabel
    Left = 40
    Top = 184
    Width = 67
    Height = 13
    Caption = 'altMerchantID'
  end
  object Command: TLabel
    Left = 56
    Top = 280
    Width = 47
    Height = 13
    Caption = 'Command'
  end
  object Label6: TLabel
    Left = 72
    Top = 312
    Width = 30
    Height = 13
    Caption = 'Result'
  end
  object txnType: TComboBox
    Left = 112
    Top = 16
    Width = 401
    Height = 21
    ItemHeight = 13
    TabOrder = 0
    Text = '0'
    Items.Strings = (
      '0'
      '9')
  end
  object txnReference: TEdit
    Left = 112
    Top = 48
    Width = 401
    Height = 21
    TabOrder = 1
    Text = 'INV98765'
  end
  object txnAmount: TEdit
    Left = 112
    Top = 80
    Width = 401
    Height = 21
    TabOrder = 2
    Text = '10000'
  end
  object txnCurrency: TEdit
    Left = 112
    Top = 112
    Width = 401
    Height = 21
    TabOrder = 3
    Text = 'AUD'
  end
  object merchantID: TEdit
    Left = 112
    Top = 144
    Width = 401
    Height = 21
    TabOrder = 4
    Text = '90323c'
  end
  object altMerchantID: TEdit
    Left = 112
    Top = 176
    Width = 401
    Height = 21
    TabOrder = 5
  end
  object shortCode: TEdit
    Left = 112
    Top = 208
    Width = 401
    Height = 21
    TabOrder = 6
  end
  object customerID: TEdit
    Left = 112
    Top = 240
    Width = 401
    Height = 21
    TabOrder = 7
    Text = '335544'
  end
  object LaunchBtn: TButton
    Left = 16
    Top = 352
    Width = 537
    Height = 25
    Caption = 'Launch HCP'
    TabOrder = 8
    OnClick = LaunchBtnClick
  end
  object ComanndArg: TEdit
    Left = 112
    Top = 272
    Width = 401
    Height = 21
    ReadOnly = True
    TabOrder = 9
  end
  object Result: TEdit
    Left = 112
    Top = 304
    Width = 401
    Height = 21
    ReadOnly = True
    TabOrder = 10
  end
end
