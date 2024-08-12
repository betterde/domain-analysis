<?php
const PINYIN_PATTERN = '/(ai|ang|an|ao|a|bang|ba[ino]?|beng|be[in]?|bing|bia[no]?|bi[en]?|bu|cang|ca[ino]?|ceng|ce[in]?|chang|cha[ino]?|cheng|che[n]?|chi|chong|chou|chuang|chua[in]|chu[ino]?|ci|cong|cou|cuan|cu[ino]?|dang|da[ino]?|deng|de[in]?|dia[no]?|ding|di[ae]?|dong|dou|duan|du[ino]?|e[rn]?|fang|fan|fa|feng|fe[in]{1}|fo[u]?|fu|gang|ga[ino]?|geng|ge[in]?|gong|gou|guang|gua[in]?|gu[ino]?|hang|ha[ino]?|heng|he|hei|hen|he[in]?|hong|hou|huang|hua[in]?|hua|hu[ino]?|jiang|jia[no]?|jiong|ji[nu]?|juan|ju[en]?|j|kang|ka[ino]?|keng|ke[n]?|kong|kou|kuang|kua[in]?|ku[ino]?|lang|la[ino]?|leng|le[i]?|liang|lia[no]?|ling|li[enu]?|long|lou|luan|lu[no]?|lv[e]?|mang|ma[ino]?|meng|me[in]?|mia[no]?|ming|mi[nu]?|mo[u]?|mu|nang|na[ino]?|neng|ne[in]?|niang|nia[no]?|ning|ni[enu]?|nong|nou|nuan|nu[on]?|nv[e]?|o|pang|pa[ino]?|pa|peng|pe[in]?|ping|pia[no]?|pi[en]?|po[u]?|pu|qiang|qia[no]?|qiong|qing|qi[aenu]?|quan|qu[en]?|rang|ra[no]{1}|reng|re[n]?|rong|rou|ri|ruan|ru[ino]?|sang|sa[ino]?|seng|se[n]?|shang|sha[ino]?|sheng|she[in]?|shi|shou|shuang|shua[in]?|shu[ino]?|si|song|sou|suan|su[ino]?|tang|ta[ino]?|teng|te|ting|ti[e]?|tia[no]?|tong|tou|tuan|tu[ino]?|wang|wa[ni]?|weng|we[in]{1}|w[ou]{1}|xiang|xia[no]?|xiong|xing|xi[enu]?|xuan|xu[en]|yang|ya[no]?|ye|ying|yi[n]?|yong|you|yo|yuan|yu[en]?|zang|za[ino]?|zeng|ze[in]?|zhang|zha[ino]?|zheng|zhe[in]?|zhi|zhong|zhou|zhuang|zhua[in]?|zhu[ino]?|zi|zong|zou|zuan|zu[ino]?)/';

// 定义拼音数量中文映射
const NUMBER_TO_CH_CHAR = ['零', '一', '二', '三', '四', '五', '六', '七', '八', '九'];

const NUMBER_UNIT = ['', '十', '百', '千', '万', '十', '百', '千', '亿'];

// 定义声母字符集
const INITIAL_CONSONANT = [
    ['b', 'p', 'm', 'f', 'd', 't', 'n', 'l', 'g', 'k', 'h', 'j', 'q', 'x', 'r', 'z', 'c', 's', 'y', 'w'],
    ['zh', 'ch', 'sh'],
];

const PINYIN_GROUP = [
    6 => [
        'chuang', 'shuang', 'zhuang'
    ],
    5 => [
        'chang', 'cheng', 'chong', 'chuai', 'chuan',
        'guang',
        'huang',
        'jiang', 'jiong',
        'kuang',
        'liang',
        'niang',
        'qiang',
        'qiong',
        'shang', 'sheng', 'shuai', 'shuan', 
        'xiang', 'xiong',
        'zhang', 'zheng', 'zhong', 'zhuai', 'zhuan'
    ],
    4 => [
        'bang', 'beng', 'bian', 'biao', 'bing',
        'cang', 'ceng', 'chai', 'chan', 'chao', 'chen', 'chou', 'chui', 'chun', 'chou', 'cong', 'cuan',
        'dang', 'deng', 'dian', 'diao', 'ding', 'dong', 'duan',
        'fang', 'feng',
        'gang', 'geng', 'gong', 'guai', 'guan',
        'hang', 'heng', 'hong', 'huai', 'huan',
        'jian', 'jiao', 'jing', 'juan',
        'kang', 'keng', 'kong', 'kuai', 'kuan',
        'lang', 'leng', 'lian', 'liao', 'ling', 'long', 'luan',
        'mang', 'meng', 'mian', 'miao', 'ming',
        'nang', 'neng', 'nian', 'niao', 'ning', 'nong', 'nuan',
        'pang', 'peng', 'pian', 'piao', 'ping',
        'qian', 'qiao', 'qing', 'quan',
        'rang', 'reng', 'rong', 'ruan',
        'sang', 'seng', 'shai', 'shan', 'shao', 'shei', 'shen', 'shou', 'shua', 'shui', 'shun', 'shou', 'song', 'suan',
        'tang', 'teng', 'tian', 'tiao', 'ting', 'tong', 'tuan',
        'wang', 'weng',
        'xian', 'xiao', 'xing', 'xuan',
        'yang', 'yiao', 'ying', 'yong', 'yuan',
        'zang', 'zeng', 'zhai', 'zhan', 'zhao', 'zhei', 'zhen', 'zhou', 'zhua', 'zhui', 'zhun', 'zong', 'zuan'
    ],
    3 => [
        'ang',
        'bai', 'ban', 'bao', 'bei', 'ben', 'bie', 'bin',
        'cai', 'can', 'cao', 'cen', 'cha', 'che', 'chi', 'chu', 'cou', 'cui', 'cun', 'cuo',
        'dai', 'dan', 'dao', 'dei', 'dia', 'die', 'diu', 'dou', 'dui', 'dun', 'duo',
        'eng',
        'fan', 'fei', 'fen', 'fou',
        'gai', 'gan', 'gao', 'gei', 'gen', 'gou', 'gua', 'gui', 'gun', 'guo',
        'hai', 'han', 'hao', 'hei', 'hen', 'hou', 'hua', 'hui', 'hun', 'huo',
        'jia', 'jie', 'jin', 'jiu', 'jue', 'jun', 'jve',
        'kai', 'kan', 'kao', 'ken', 'kou', 'kua', 'kui', 'kun', 'kuo',
        'lai', 'lan', 'lao', 'lei', 'lia', 'lie', 'lin', 'liu', 'lou', 'lue', 'lun', 'luo', 'lve',
        'mai', 'man', 'mao', 'mei', 'men', 'mie', 'min', 'miu', 'mou',
        'nai', 'nan', 'nao', 'nei', 'nen', 'nie', 'nin', 'niu', 'nou', 'nue', 'nuo', 'nve',
        'pai', 'pan', 'pao', 'pei', 'pen', 'pie', 'pin', 'pou',
        'qia', 'qie', 'qin', 'qiu', 'que', 'qui', 'qun', 'qve',
        'ran', 'rao', 'ren', 'rou', 'rui', 'run', 'rou',
        'sai', 'san', 'sao', 'sen', 'sha', 'she', 'shi', 'shu', 'sou', 'sui', 'sun', 'suo',
        'tai', 'tan', 'tao', 'tei', 'tie', 'tou', 'tui', 'tun', 'tuo',
        'wai', 'wan', 'wei', 'wen',
        'xia', 'xie', 'xin', 'xiu', 'xue', 'xun', 'xve',
        'yan', 'yao', 'yin', 'you', 'yue', 'yun', 'yve',
        'zai', 'zan', 'zao', 'zei', 'zen', 'zha', 'zhe', 'zhi', 'zhu', 'zou', 'zui', 'zun', 'zuo'
    ],
    2 => [
        'ai', 'an', 'ao', 
        'ba', 'bi', 'bo', 'bu', 
        'ca', 'ce', 'ci', 'cu', 
        'da', 'de', 'di', 'du', 
        'ei', 'en', 'er', 
        'fa', 'fo', 'fu', 
        'ga', 'ge', 'gu',
        'ha', 'he', 'hu',
        'ji', 'ju', 
        'ka', 'ke', 'ku',
        'la', 'le', 'li', 'lo', 'lu', 'lv',
        'ma', 'me', 'mi', 'mo', 'mu',
        'na', 'ne', 'ni', 'nu', 
        'ou', 
        'pa', 'pi', 'po', 'pu',
        'qi', 'qu',
        're', 'ri', 'ru',
        'sa', 'se', 'si', 'su',
        'ta', 'te', 'ti', 'tu',
        'wa', 'wo', 'wu',
        'xi', 'xu',
        'ya', 'ye', 'yi', 'yo', 'yu',
        'za', 'ze', 'zi', 'zu'
    ],
    1 => ['a', 'e', 'o']
];

const CATEGORY_DOMAIN = [
    'cn' => [
        'ac', 'com', 'org', 'net', 'gov', 'mil', 'edu', 'ah', 'bj', 'cq',
        'fj', 'gd', 'gs', 'gz', 'gx', 'ha', 'hb', 'he', 'hi', 'hl', 'hn',
        'jl', 'js', 'jx', 'ln', 'nm', 'nx', 'qh', 'sc', 'sd', 'sh', 'sn',
        'sx', 'tj', 'tw', 'xj', 'xz', 'yn', 'zj', 'hk', 'mo',
    ],
];

const FORMAT_WRONG = '域名格式有误';

const ALLOW_MAX_DOMAIN_COUNT = 20;

/**
 * 分析域名
 *
 * @param array $domains
 * @return array
 */
function analyze(array $domains): array
{
    $result = [
        'success' => [],
        'error' => null,
    ];
    
    if (count($domains) > ALLOW_MAX_DOMAIN_COUNT) {
        $result['error'] = '您录入的域名数量超出了最大' . ALLOW_MAX_DOMAIN_COUNT . '个限制，请分割后在尝试提交！';
        return $result;
    }
    
    foreach ($domains as $domain) {
        if (validateDomain($domain) === false) {
            $result['success'][$domain] = FORMAT_WRONG;
            continue;
        }
        
        $segmentation = explode('.', $domain);
        if (count($segmentation) == 3 && end($segmentation) == 'cn' && in_array(prev($segmentation), CATEGORY_DOMAIN['cn'])) {
            [$name, $tld] = $segmentation;
        } elseif (count($segmentation) != 2) {
            // 验证域名长度，忽略子域名
            $result['success'][$domain] = FORMAT_WRONG;
            continue;
        } else {
            [$name, $tld] = $segmentation;
        }
        
        // 判断是否为数字
        if (is_numeric($name)) {
            $result['success'][$domain] = convertArabicNumeralsToChineseCharacters(strlen($name)) . '位数字';
        } elseif (ctype_alpha($name)) {
            $origin = $name;
            $len = strlen($name);
            $characterSet = [];
            
            while ($len != 0) {
                $character = mb_substr($origin, 0, $len);
                if (isset(INITIAL_CONSONANT[strlen($character) - 1]) && in_array($character, INITIAL_CONSONANT[strlen($character) - 1])) {
                    $characterSet[] = $character;
                    if (strlen($character) == strlen($origin)) {
                        break;
                    }
                    
                    //清除已匹配
                    $origin = mb_substr($origin, strlen($character));
                    $len = strlen($origin);
                    continue;
                }
                
                $len--;
            }
            // 判断是否为纯声母
            if (implode('', $characterSet) == $name) {
                $result['success'][$domain] = convertArabicNumeralsToChineseCharacters(strlen($name)) . '位纯声母';
                continue;
            }

            // 判断是否为拼音
            // $checkoutResult = checkIsPinyin($name);
            $checkoutResult = checkIsPingyinUsingEnums($name);
            if (implode('', $checkoutResult) === $name) {
                $result['success'][$domain] = convertArabicNumeralsToChineseCharacters(count($checkoutResult) - 1, true) . '拼';
            } else {
                $result['success'][$domain] = convertArabicNumeralsToChineseCharacters(strlen($name)) . '位字母';
            }
        } elseif (preg_match('/^(?:[-A-Za-z0-9-_]+)?$/', $name)) {
            $result['success'][$domain] = '杂米';
        }
    }
    
    return $result;
}

// 使用拼音枚举数组进行检查
function checkIsPingyinUsingEnums(string $name): array {
    $origin = $name;
    $result = [];
    $round = 0;

    while (strlen($name) > 0) {
        $matched = false;
        foreach(PINYIN_GROUP as $length => $items) {
            if ($length > strlen($name)) {
                continue;
            }
            
            foreach($items as $item) {
                if (strpos($name, $item) === 0) {
                    $matched = true;

                    $lastChar = substr($item, -1);
                    if (in_array($lastChar, ['n', 'g'])) {
                        // 如果是最后一个拼音，则不进行特殊处理
                        if ($name === $item) {
                            $name = substr($name, $length);
                            $result[count($result)] = [$item];
                        } else {
                            // 如果不是最后一个拼音，且以 n 或 g 结尾，则保留两种可能性
                            $name = substr($name, $length - 1);
                            $result[count($result)] = [substr($item, 0, $length - 1), $item];
                        }
                        break 2;
                    } else {
                        $name = substr($name, $length);
                        $result[count($result)] = [$item];
                        break 2;
                    }
                }
            }
        }

        if ($matched == false) {
            $last = end($result);

            if (count($last) == 2) {
                $name = substr($name, 1);
            } else {
                return [];
            }
        }
    }

    $result = crossJoin(...$result);

    $min = 0;
    $minIndex = 0;

    // 对结果进行比对，并取拼音数量最小的作为最终结果
    foreach ($result as $index => $item) {
        $count = count($item);
        $min = $count;
        if (implode('', $item) === $origin && $count <= $min) {
            $min = count($item);
            $minIndex = $index;
        }
    }

    return $result[$minIndex];
}

// 数组元素交叉连接，生成笛卡尔积
function crossJoin(...$arrays) {
    $results = [[]];

        foreach ($arrays as $index => $array) {
            $append = [];

            foreach ($results as $product) {
                foreach ($array as $item) {
                    $product[$index] = $item;

                    $append[] = $product;
                }
            }

            $results = $append;
        }

        return $results;
}

// 检查给定字符串是否为拼音
function checkIsPinyin(string $name): array {
    $result = [];

    if (empty($name)) {
        return [];
    }

    if ($count = preg_match_all(PINYIN_PATTERN, $name, $matchs)) {
        $result = reset($matchs);
        if (empty($result)) {
            return $result;
        }

        if (implode('', $result) == $name) {
            return $result;
        } elseif (!empty($result)) {
            foreach($result as $index => $match) {
                $lastChar = substr($match, -1);
                // 对以声母结尾的拼音尝试重新分段
                if (in_array($lastChar, ['n', 'g'])) {
                    $checkedString = substr($match, 0, strlen($match) - 1);
                    $result = array_slice($result, 0, $index + 1);
                    $result[$index] = $checkedString;
                    $uncheckString = substr($name, strlen(implode('', $result)));
                    $result = array_merge($result, checkIsPinyin($uncheckString));
                    break;
                }
            }
        }
    }

    return $result;
}

/**
 * 检查域名格式是否正确
 *
 * @param $domain
 * @return bool
 */
function validateDomain($domain): bool
{
    if (preg_match('/^(?![-_])(?:[-A-Za-z0-9-_]+\.)+[A-Za-z]{2,}(?:\.[A-Za-z]{2,})?$/', $domain)) {
        return true;
    } else {
        return false;
    }
}

/**
 * 将阿拉伯数字转换为中文字符
 *
 * @param int $num
 * @param bool $custom
 * @return string
 */
function convertArabicNumeralsToChineseCharacters(int $num, bool $custom = false): string
{
    $chineseCharacters = NUMBER_TO_CH_CHAR;
    
    $numStr = (string)$num;
    
    $count = strlen($numStr);
    $lastFlag = true;
    $zeroFlag = true;
    $chiStr = '';
    
    if ($count == 2) {
        $tempNum = $numStr[0];
        $chiStr = $tempNum == 1 ? NUMBER_UNIT[1] : $chineseCharacters[$tempNum] . NUMBER_UNIT[1];
        $tempNum = $numStr[1];
        $chiStr .= $tempNum == 0 ? '' : $chineseCharacters[$tempNum];
    } else if ($count > 2) {
        $index = 0;
        for ($i = $count - 1; $i >= 0; $i--) {
            $tempNum = $numStr[$i];
            if ($tempNum == 0) {
                if (!$zeroFlag && !$lastFlag) {
                    $chiStr = $chineseCharacters[$tempNum] . $chiStr;
                    $lastFlag = true;
                }
                
                if ($index == 4) {
                    $chiStr = "万" . $chiStr;
                }
            } else {
                if ($i == 0 && $tempNum == 1 && $index == 1) {
                    $chiStr = NUMBER_UNIT[$index % 9] . $chiStr;
                } else {
                    $chiStr = $chineseCharacters[$tempNum] . NUMBER_UNIT[$index % 9] . $chiStr;
                }
                
                $zeroFlag = false;
                $lastFlag = false;
            }
            
            $index++;
        }
    } else {
        if ($custom) {
            $chineseCharacters = ['单', '双', '三', '四', '五', '六', '七', '八', '九'];
        }
        
        $chiStr = $chineseCharacters[$numStr[0]];
    }
    
    return $chiStr;
}