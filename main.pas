unit main;

interface

uses
  Windows, Messages, SysUtils, Variants, Classes, Graphics, Controls, Forms,
  Dialogs, StdCtrls, ExtCtrls, ShellApi, StrUtils ;

type
  TForm1 = class(TForm)
    txnType: TComboBox;
    Label2: TLabel;
    Label1: TLabel;
    Label3: TLabel;
    Label4: TLabel;
    txnReference: TEdit;
    txnAmount: TEdit;
    txnCurrency: TEdit;
    Label5: TLabel;
    Label9: TLabel;
    Label7: TLabel;
    merchantID: TEdit;
    altMerchantID: TEdit;
    Label8: TLabel;
    shortCode: TEdit;
    customerID: TEdit;
    LaunchBtn: TButton;
    ComanndArg: TEdit;
    Command: TLabel;
    Result: TEdit;
    Label6: TLabel;
    procedure LaunchBtnClick(Sender: TObject);

  private
    { Private declarations }
  public
    { Public declarations }
  end;

var
  Form1: TForm1;

implementation

{$R *.dfm}

function GetDosOutput(CommandLine: string; Work: string = 'C:\'): string;
var
  SA: TSecurityAttributes;
  SI: TStartupInfo;
  PI: TProcessInformation;
  StdOutPipeRead, StdOutPipeWrite: THandle;
  WasOK: Boolean;
  Buffer: array[0..255] of AnsiChar;
  BytesRead: Cardinal;
  WorkDir: string;
  Handle: Boolean;
begin
  Result := '';
  with SA do begin
    nLength := SizeOf(SA);
    bInheritHandle := True;
    lpSecurityDescriptor := nil;
  end;
  CreatePipe(StdOutPipeRead, StdOutPipeWrite, @SA, 0);
  try
    with SI do
    begin
      FillChar(SI, SizeOf(SI), 0);
      cb := SizeOf(SI);
      dwFlags := STARTF_USESHOWWINDOW or STARTF_USESTDHANDLES;
      wShowWindow := SW_HIDE;
      hStdInput := GetStdHandle(STD_INPUT_HANDLE); // don't redirect stdin
      hStdOutput := StdOutPipeWrite;
      hStdError := StdOutPipeWrite;
    end;
    WorkDir := Work;
    Handle := CreateProcess(nil, PChar('cmd.exe /C ' + CommandLine),
                            nil, nil, True, 0, nil,
                            PChar(WorkDir), SI, PI);
    CloseHandle(StdOutPipeWrite);
    if Handle then
      try
        repeat
          WasOK := ReadFile(StdOutPipeRead, Buffer, 255, BytesRead, nil);
          if BytesRead > 0 then
          begin
            Buffer[BytesRead] := #0;
            Result := Result + Buffer;
          end;
        until not WasOK or (BytesRead = 0);
        WaitForSingleObject(PI.hProcess, INFINITE);
      finally
        CloseHandle(PI.hThread);
        CloseHandle(PI.hProcess);
      end;
  finally
    CloseHandle(StdOutPipeRead);
  end;
end;


procedure TForm1.LaunchBtnClick(Sender: TObject);
var
  GeneratorCmd, HcpUrl, CurrPath: string;
begin
  LaunchBtn.Caption := 'Processing, please wait ...';
  LaunchBtn.Enabled := False;
  CurrPath := GetCurrentDir();
  GeneratorCmd := 'php\php.exe php\generatehcp.php' +
    ' --txnType=' +  txnType.Text +
    ' --txnReference=' + txnReference.Text +
    ' --txnAmount=' + txnAmount.Text +
    ' --txnCurrency=' + txnCurrency.Text +
    ' --merchantID=' + merchantID.Text+
    ' --shortCode=' + shortCode.Text +
    ' --altMerchantID='+ altMerchantID.Text +
    ' --customerID=' + customerID.Text+
    ' --transactionKey=***REPLACE-WITH-TRANSACTION-KEY***';

  HcpUrl := GetDosOutput(GeneratorCmd,CurrPath);
  ComanndArg.Text := GeneratorCmd;
  Result.Text :=  HcpUrl;
  //if AnsiContainsText(HcpUrl,'hpp') then ShellExecute(self.WindowHandle,'open',PChar(HcpUrl),nil,nil, SW_SHOWNORMAL);
  LaunchBtn.Caption := 'Launch HCP';
  LaunchBtn.Enabled := True;
end;

end.
